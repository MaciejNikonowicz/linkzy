<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LinkResource extends JsonResource
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
            'type' => 'Link',
            'attributes' => [
                'user_id' => $this->user_id,
                'original_link' => $this->original_link,
                'short_link' => $this->short_link,
                'slug' => $this->slug,
                'visits_counter' => $this->visits_counter,
                'expiration_date' => $this->expiration_date,
                'is_valid' => $this->is_valid,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
            ]
        ];
    }
}
