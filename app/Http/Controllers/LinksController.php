<?php

namespace App\Http\Controllers;

use App\Http\Requests\LinkRequest;
use App\Http\Resources\LinkResource;
use App\Http\Resources\LinkStatisticsResource;
use App\Models\Link;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LinksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Link::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LinkRequest $request)
    {
        if($request->original_link) {
            if(auth()->user()) {
                $link = auth()->user()->links()->create([
                    'user_id' => auth('api')->user()->id,
                    'original_link'=> $request->original_link,
                    'slug' => $request->slug ?? Str::random(10),
                    'expiration_date' => Carbon::now()->addDays(30)->format('Y-m-d H:i:m')
                ]);
            } else {
                $link = Link::create([
                    'original_link'=> $request->original_link,
                    'slug' => $request->slug ?? Str::random(10),
                    'expiration_date' => Carbon::now()->addHours(48)->format('Y-m-d H:i:m')
                ]);
            }
            
            
            if($link) {
                $link->update([
                    'short_link' => url('l/' . $link->slug),
                ]);
            }

            return new LinkResource($link);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Link $link)
    {
        if($link) {
            $link_statistics = $link->statistics()->create([
                'link_id' => $link->id,
                'visit_date' => Carbon::now()->format('Y-m-d H:i:m'),
                'visit_ip' => $request->ip(),
                'visit_referer' => $request->headers->get('referer') ?? 'No referer'
            ]);
        }
        return new LinkStatisticsResource($link_statistics);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Restore not valid link
     *
     * @param  Link  $link
     * @return \Illuminate\Http\Response
     */
    public function restore(Link $link)
    {
        if($link) {
            $link->update([
                'is_valid' => true
            ]);
        }
    }

    /**
     * Disable a link that is valid
     *
     * @param  Link  $link
     * @return \Illuminate\Http\Response
     */
    public function disable(Link $link)
    {
        if($link) {
            $link->update([
                'is_valid' => false
            ]);
        }
    }
}
