<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory;
    public function show() {
        return $this->belongsTo('App\Models\Show');
    }
    protected $fillable = ['show_id', 'title', 'description', 'duration', 'airing_time', 'thumbnail', 'video_asset', 'thumbnail_url'];

    
}
