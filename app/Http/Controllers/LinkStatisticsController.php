<?php

namespace App\Http\Controllers;

use App\Http\Resources\LinkStatisticsResource;
use App\Models\LinkStatistics;
use Illuminate\Support\Facades\DB;

class LinkStatisticsController extends Controller
{
    public function show($link_id)
    {   
        // dd($link_id);
        $link_statistics = DB::table('links')->join('link_statistics', 'links.id', '=', 'link_statistics.link_id')->where('link_statistics.link_id', $link_id)->get();

        // $link_statistics = LinkStatistics::where('link_id', $link_id)->get();
        return $link_statistics;
    }
}
