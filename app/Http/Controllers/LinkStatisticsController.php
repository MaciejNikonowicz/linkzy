<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class LinkStatisticsController extends Controller
{
    public function show($link_id)
    {   
        return DB::table('links')->join('link_statistics', 'links.id', '=', 'link_statistics.link_id')->where('link_statistics.link_id', $link_id)->get();
    }
}
