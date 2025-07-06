<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Skill;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::whereNull('parent_id')->with('children.children')->get();
        return view('public.skills.index', compact('skills'));
    }
}
