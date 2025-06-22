<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LandingWindow extends Model
{
    protected $fillable = [
        'type',
        'title',
        'img',
        'heading',
        'subheading',
        'content',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
