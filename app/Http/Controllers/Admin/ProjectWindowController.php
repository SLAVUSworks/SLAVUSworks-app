<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProjectsWindow;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectWindowController extends Controller
{
    public function index()
    {
        $projects = ProjectsWindow::all();
        return view('admin.project_windows.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.project_windows.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'year' => 'required|integer',
            'image' => 'nullable|image',
            'content' => 'nullable|string',
            'stacks' => 'nullable|string',
        ]);

        $data['stacks'] = collect(explode(',', $request->input('stacks')))
            ->map(fn($tag) => trim($tag))
            ->filter()
            ->implode(',');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('img/projects', 'public');
        }

        ProjectsWindow::create($data);
        return redirect()->route('admin.projects.index')->with('success', 'Project created.');
    }

    public function edit(ProjectsWindow $project)
    {
        return view('admin.project_windows.edit', compact('project'));
    }

    public function update(Request $request, ProjectsWindow $project)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'year' => 'required|integer',
            'image' => 'nullable|image',
            'content' => 'nullable|string',
            'stacks' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('img/projects', 'public');
        }

        $project->update($data);
        return redirect()->route('admin.projects.index')->with('success', 'Project updated.');
    }

    public function destroy(ProjectsWindow $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index')->with('success', 'Project deleted.');
    }
}

