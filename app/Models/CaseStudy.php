<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseStudy extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'company',
        'duration',
        'core_problem',
        'solution',
        'technologies_used',
        'results',
    ];

    public function images()
    {
        return $this->hasMany(CaseStudyImage::class);
    }
}

