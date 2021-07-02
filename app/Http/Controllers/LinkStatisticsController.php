<?php

namespace App\Http\Controllers;

use App\Http\Resources\LinkStatisticsResource;
use App\Models\LinkStatistics;

class LinkStatisticsController extends Controller
{
    public function show($link_id)
    {   
        $link_statistics = LinkStatistics::where('link_id', $link_id)->get();
        return LinkStatisticsResource::collection($link_statistics);
    }
}
