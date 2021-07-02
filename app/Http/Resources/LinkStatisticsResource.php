<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LinkStatisticsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => (string)$this->id,
            'type' => 'LinkStatistics',
            'attributes' => [
                'link_id' => $this->link_id,
                'visit_date' => $this->visit_date,
                'visit_ip' => $this->visit_ip,
                'visit_referer' => (string) $this->visit_referer,
                'visits_counter' => $this->visits_counter,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
            ]
        ];
    }
}
