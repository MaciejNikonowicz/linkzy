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
                return redirect('/link-expired')->with('message', 'This link does not exist anymore');
            } else {
                $link->update([
                    'is_valid' => false,
                ]);
                return redirect('/link-expired')->with('message', 'This link has expired');
            }
        } elseif (!$link->is_valid) {
            return redirect('/link-expired')->with('message', 'This link has expired');
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
