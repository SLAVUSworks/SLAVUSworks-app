<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectsWindow extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'image',
        'content',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
