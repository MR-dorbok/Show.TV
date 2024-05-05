<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Show extends Model
{
    use HasFactory;

    public function episodes()
    {
        return $this->hasMany(Episode::class);
    }

    protected $fillable = ['title', 'description', 'thumbnail', 'thumbnail_url'];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_show');
    }
}
