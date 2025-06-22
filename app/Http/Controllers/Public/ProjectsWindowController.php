<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\ProjectsWindow;
use Illuminate\Http\Request;

class ProjectsWindowController extends Controller
{
    public function projects()
    {
        $windows = ProjectsWindow::latest()->get();

        return view('public.projectlist.projects', compact('windows'));
    }

    public function project($slug)
    {
        $project = ProjectsWindow::where('slug', $slug)->firstOrFail();

        return view('public.projectlist.project', [
            'project' => $project
        ]);
    }
}
