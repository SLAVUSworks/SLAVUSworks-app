<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::whereNull('parent_id')->with('children.children')->get();
        return view('admin.skills.index', compact('skills'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'skills' => 'required|array'
        ]);

        foreach ($data['skills'] as $main) {
            $mainSkill = Skill::create(['name' => $main['name']]);

            if (!empty($main['children'])) {
                foreach ($main['children'] as $sub) {
                    $subSkill = Skill::create([
                        'name' => $sub['name'],
                        'parent_id' => $mainSkill->id
                    ]);

                    if (!empty($sub['children'])) {
                        foreach ($sub['children'] as $child) {
                            Skill::create([
                                'name' => $child['name'],
                                'parent_id' => $subSkill->id
                            ]);
                        }
                    }
                }
            }
        }

        return redirect()->back()->with('success', 'Skills saved.');
    }
}
