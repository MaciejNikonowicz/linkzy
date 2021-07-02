<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;

    protected $fillable = ['original_link', 'short_link', 'slug', 'visits_counter'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function statistics()
    {
        return $this->hasMany(LinkStatistics::class);
    }
}
