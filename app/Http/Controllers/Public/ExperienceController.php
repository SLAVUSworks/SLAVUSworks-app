<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Experience;

class ExperienceController extends Controller
{
    public function experience()
    {
        $experiences = Experience::orderByDesc('start_date')->get();
        return view('public.experience.index', compact('experiences'));
    }
}
