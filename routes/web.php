<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\LandingWindowController;
use App\Http\Controllers\Admin\ProjectWindowController;
use App\Http\Controllers\Admin\ExperienceController;
use App\Http\Controllers\Admin\CaseStudyController;

use App\Http\Controllers\Public\LandingWindowController as PublicLandingWindowController;
use App\Http\Controllers\Public\ProjectsWindowController as PublicProjectsWindowController;
use App\Http\Controllers\Public\SkillController as PublicSkillController;
use App\Http\Controllers\Public\ExperienceController as PublicExperienceController;
use App\Http\Controllers\Public\CaseStudyController as PublicCaseStudyController;

use App\Models\CaseStudy;

Route::get('/desktop', function () {
     return view('public.desktop');
})->name('desktop');

Route::get('/', [PublicLandingWindowController::class, 'welcome'])->name('welcome');
Route::get('/biography', [PublicLandingWindowController::class, 'biography'])->name('biography');
Route::get('/slavusworks', [PublicLandingWindowController::class, 'slavusworks'])->name('slavusworks');
Route::get('/contact', [PublicLandingWindowController::class, 'contact'])->name('contact');

Route::get('/projects', [PublicProjectsWindowController::class, 'projects'])->name('projectslist');

Route::get('/skills', [PublicSkillController::class, 'index'])->name('skills');

Route::get('/experience', [PublicExperienceController::class, 'experience'])->name('experience');

Route::get('/case-studies', [PublicCaseStudyController::class, 'index'])->name('caseStudies');
Route::get('/case-studies/{caseStudy}/gallery', function (CaseStudy $caseStudy) {
    return view('public.case-studies.gallery-modal', compact('caseStudy'));
})->name('case-studies.gallery');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/landing-windows', [LandingWindowController::class, 'index'])->name('landing-windows.index');
        Route::get('/landing-windows/create', [LandingWindowController::class, 'create'])->name('landing-windows.create');
        Route::post('/landing-windows', [LandingWindowController::class, 'store'])->name('landing-windows.store');
        Route::get('/landing-windows/{landingWindow}/edit', [LandingWindowController::class, 'edit'])->name('landing-windows.edit');
        Route::put('/landing-windows/{landingWindow}', [LandingWindowController::class, 'update'])->name('landing-windows.update');

        Route::resource('projects', ProjectWindowController::class);

        Route::get('skills', [SkillController::class, 'index'])->name('skills.index');
        Route::post('skills', [SkillController::class, 'store'])->name('skills.store');
        Route::get('skills/{skill}', [SkillController::class, 'edit'])->name('skills.edit');
        Route::get('skills/{skill}/edit', [SkillController::class, 'edit'])->name('skills.edit');
        Route::put('skills/{skill}', [SkillController::class, 'update'])->name('skills.update');
        Route::delete('skills/{skill}', [SkillController::class, 'destroy'])->name('skills.destroy');

        Route::resource('experience', ExperienceController::class);

        Route::resource('case-studies', CaseStudyController::class);
        Route::delete('case-studies/image/{image}', [CaseStudyController::class, 'destroyImage'])->name('case-studies.image.destroy');

        Route::group(['prefix' => 'filemanager', 'middleware' => ['web', 'auth']], function () {
            \UniSharp\LaravelFilemanager\Lfm::routes();
        });
    });
});

$traps = ['env', '.env', 'admin', 'config', 'phpmyadmin', 'pma'];

foreach ($traps as $path) {
    Route::get($path, function () {
        return view('errors.rickroll');
    });
}

require __DIR__.'/auth.php';

