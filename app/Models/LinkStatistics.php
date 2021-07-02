<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LinkStatistics extends Model
{
    use HasFactory;

    protected $fillable = ['link_id', 'visit_date', 'visit_ip', 'visit_referer'];

    public function link()
    {
        return $this->belongsTo(Link::class);
    }
}
