<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LandingWindow;
use Illuminate\Http\Request;

class LandingWindowController extends Controller
{
    public function index()
    {
        $windows = LandingWindow::all();
        return view('admin.landing_windows.index', compact('windows'));
    }

    public function create()
    {
        $existingTypes = LandingWindow::pluck('type')->toArray();
        $availableTypes = ['welcome', 'bio', 'slapusworks', 'contact'];
        $remainingTypes = array_diff($availableTypes, $existingTypes);

        if (empty($remainingTypes)) {
            return redirect()->route('admin.landing-windows.index')->with('error', 'All types are already filled.');
        }

        return view('admin.landing_windows.create', compact('remainingTypes'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'type' => 'required|in:welcome,bio,slapusworks,contact|unique:landing_windows,type',
            'title' => 'required',
            'img' => 'nullable|image',
            'heading' => 'required',
            'subheading' => 'nullable',
            'content' => 'nullable',
        ]);

        if ($request->hasFile('img')) {
            $data['img'] = $request->file('img')->store('img/landing', 'public');
        }

        LandingWindow::create($data);
        return redirect()->route('admin.landing-windows.index')->with('success', 'Content created.');
    }

    public function edit(LandingWindow $landingWindow)
    {
        return view('admin.landing_windows.edit', compact('landingWindow'));
    }

    public function update(Request $request, LandingWindow $landingWindow)
    {
        $data = $request->validate([
            'type' => 'required',
            'title' => 'required',
            'img' => 'nullable|image',
            'heading' => 'required',
            'subheading' => 'nullable',
            'content' => 'nullable',
        ]);

        if ($request->hasFile('img')) {
            $data['img'] = $request->file('img')->store('img/landing', 'public');
        }

        $landingWindow->update($data);
        return redirect()->route('admin.landing-windows.index')->with('success', 'Content updated.');
    }
}

