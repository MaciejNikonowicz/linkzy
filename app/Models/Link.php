<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Link extends Model
{
    use HasFactory;

    protected $fillable = ['original_link', 'short_link', 'slug', 'visits_counter', 'expiration_date', 'is_valid'];
    

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function statistics()
    {
        return $this->hasMany(LinkStatistics::class);
    }
}
