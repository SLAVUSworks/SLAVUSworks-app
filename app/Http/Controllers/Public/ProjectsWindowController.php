<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\ProjectsWindow;

class ProjectsWindowController extends Controller
{
    public function projects()
    {
        $windows = ProjectsWindow::latest()->get();

        return view('public.projectlist.projects', compact('windows'));
    }
}
