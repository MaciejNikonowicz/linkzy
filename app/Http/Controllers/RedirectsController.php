<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RedirectsController extends Controller
{
    public function redirectToOriginalLink(Request $request, $slug)
    {
        $link = Link::where('slug', $slug)->first();

        if ($link->expiration_date < Carbon::now()->format('Y-m-d H:i:m')) {
            if (!$link->user_id) {
                $link->delete();
                return redirect('/404')->with('message', 'Link does not exist anymore');
            } else {
                $link->update([
                    'is_valid' => false,
                ]);
                return redirect('/404')->with('message', 'Link expired');
            }
        } else {
            $link_statistics = $link->statistics()->create([
                'link_id' => $link->id,
                'visit_date' => Carbon::now()->format('Y-m-d H:i:m'),
                'visit_ip' => $request->ip(),
                'visit_referer' => $request->headers->get('referer') ?? 'No referer'
            ]);

            if ($link_statistics) {
                $link->increment('visits_counter');
            }
        }

        return redirect($link->original_link);
    }
}
