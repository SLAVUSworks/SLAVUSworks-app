<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Public\LandingWindowController;
use App\Http\Controllers\Public\ProjectsWindowController;
use App\Http\Controllers\Public\SkillController as PublicSkillController;
use App\Http\Controllers\Public\ExperienceController as PublicExperienceController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\LandingWindowController as AdminLandingWindowController;
use App\Http\Controllers\Admin\ProjectWindowController as AdminProjectWindowController;
use App\Http\Controllers\Admin\ExperienceController;

Route::get('/desktop', function () { return view('public.desktop');})->name('desktop');

Route::get('/', [LandingWindowController::class, 'welcome'])->name('welcome');
Route::get('/biography', [LandingWindowController::class, 'biography'])->name('biography');
Route::get('/slavusworks', [LandingWindowController::class, 'slavusworks'])->name('slavusworks');
Route::get('/contact', [LandingWindowController::class, 'contact'])->name('contact');

Route::get('/projects', [ProjectsWindowController::class, 'projects'])->name('projectslist');

Route::get('/skills', [PublicSkillController::class, 'index'])->name('skills');

Route::get('/experience', [PublicExperienceController::class, 'experience'])->name('experience');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/landing-windows', [AdminLandingWindowController::class, 'index'])->name('landing-windows.index');
        Route::get('/landing-windows/create', [AdminLandingWindowController::class, 'create'])->name('landing-windows.create');
        Route::post('/landing-windows', [AdminLandingWindowController::class, 'store'])->name('landing-windows.store');
        Route::get('/landing-windows/{landingWindow}/edit', [AdminLandingWindowController::class, 'edit'])->name('landing-windows.edit');
        Route::put('/landing-windows/{landingWindow}', [AdminLandingWindowController::class, 'update'])->name('landing-windows.update');

        Route::resource('projects', AdminProjectWindowController::class);

        Route::get('skills', [SkillController::class, 'index'])->name('skills.index');
        Route::post('skills', [SkillController::class, 'store'])->name('skills.store');
        Route::get('skills/{skill}', [SkillController::class, 'edit'])->name('skills.edit');
        Route::get('skills/{skill}/edit', [SkillController::class, 'edit'])->name('skills.edit');
        Route::put('skills/{skill}', [SkillController::class, 'update'])->name('skills.update');
        Route::delete('skills/{skill}', [SkillController::class, 'destroy'])->name('skills.destroy');

        Route::resource('experience', ExperienceController::class);
    });
});

$traps = ['env', '.env', 'admin', 'config', 'phpmyadmin', 'pma'];

foreach ($traps as $path) {
    Route::get($path, function () {
        return view('errors.rickroll');
    });
}

require __DIR__.'/auth.php';

