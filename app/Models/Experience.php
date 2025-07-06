<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $table = 'experience';

    protected $fillable = [
        'start_date',
        'end_date',
        'job_title',
        'company_name',
        'job_position',
        'description',
    ];

    public function getFormattedStartDateAttribute()
    {
        return $this->start_date->format('F Y');
    }

    public function getFormattedEndDateAttribute()
    {
        return $this->end_date ? $this->end_date->format('F Y') : 'Present';
    }
}
