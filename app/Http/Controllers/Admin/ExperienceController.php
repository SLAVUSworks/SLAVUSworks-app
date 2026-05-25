<?php

namespace App\Http\Controllers\Admin;

use App\Models\Experience;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExperienceController extends Controller
{
    public function index()
    {
        $experiences = Experience::orderByDesc('start_date')->get();
        return view('admin.experience.index', compact('experiences'));
    }

    public function create()
    {
        return view('admin.experience.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'start_date'    => 'required|date',
            'end_date'      => 'nullable|date|after_or_equal:start_date',
            'category'      => 'required|string|max:255',
            'job_title'     => 'required|string|max:255',
            'company_name'  => 'required|string|max:255',
            'job_position'  => 'nullable|string|max:255',
            'description'   => 'nullable|string',
        ]);

        $experience = Experience::create($validated);
        return redirect()->route('admin.experience.index')->with('success', 'Experience created successfully.');
    }

    public function show($id)
    {
        $experience = Experience::findOrFail($id);
        return response()->json($experience);
    }

    public function edit($id)
    {
        $experience = Experience::findOrFail($id);
        return view('admin.experience.edit', compact('experience'));
    }

    public function update(Request $request, $id)
    {
        $experience = Experience::findOrFail($id);

        $validated = $request->validate([
            'start_date'    => 'sometimes|required|date',
            'end_date'      => 'nullable|date|after_or_equal:start_date',
            'category'      => 'sometimes|required|string|max:255',
            'job_title'     => 'sometimes|required|string|max:255',
            'company_name'  => 'sometimes|required|string|max:255',
            'job_position'  => 'nullable|string|max:255',
            'description'   => 'nullable|string',
        ]);

        $experience->update($validated);
        return redirect()->route('admin.experience.index')->with('success', 'Experience updated successfully.');
    }

    public function destroy($id)
    {
        $experience = Experience::findOrFail($id);
        $experience->delete();

        return redirect()->route('admin.experience.index')->with('success', 'Experience deleted successfully.');
    }
}
