<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CaseStudy;
use App\Models\CaseStudyImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CaseStudyController extends Controller
{
    public function index()
    {
        $caseStudies = CaseStudy::with('images')->latest()->get();
        return view('admin.case_studies.index', compact('caseStudies'));
    }

    public function create()
    {
        return view('admin.case_studies.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'company' => 'required',
            'duration' => 'required',
            'core_problem' => 'required',
            'solution' => 'required',
            'images.*' => 'nullable|image|max:2048',
        ]);

        $caseStudy = CaseStudy::create($request->except('images'));

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('case_studies', 'public');
                CaseStudyImage::create([
                    'case_study_id' => $caseStudy->id,
                    'path' => $path,
                ]);
            }
        }

        return redirect()->route('admin.case-studies.index')->with('success', 'Created successfully!');
    }

    public function edit(CaseStudy $caseStudy)
    {
        $caseStudy->load('images');
        return view('admin.case_studies.edit', compact('caseStudy'));
    }

    public function update(Request $request, CaseStudy $caseStudy)
    {
        $request->validate([
            'title' => 'required',
            'company' => 'required',
            'duration' => 'required',
            'core_problem' => 'required',
            'solution' => 'required',
            'images.*' => 'nullable|image|max:2048',
        ]);

        $caseStudy->update($request->except('images'));

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('case_studies', 'public');
                CaseStudyImage::create([
                    'case_study_id' => $caseStudy->id,
                    'path' => $path,
                ]);
            }
        }

        return redirect()->route('admin.case-studies.index')->with('success', 'Updated successfully!');
    }

    public function destroy(CaseStudy $caseStudy)
    {
        foreach ($caseStudy->images as $img) {
            Storage::disk('public')->delete($img->path);
        }

        $caseStudy->delete();

        return redirect()->route('admin.case-studies.index')->with('success', 'Deleted successfully!');
    }

    public function destroyImage(CaseStudyImage $image)
    {
        Storage::disk('public')->delete($image->path);
        $image->delete();

        return back()->with('success', 'Image deleted!');
    }
}

