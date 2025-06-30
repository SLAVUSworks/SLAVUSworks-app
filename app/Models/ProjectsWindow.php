<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectsWindow extends Model
{
    protected $fillable = [
        'title',
        'year',
        'image',
        'content',
        'stacks',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
