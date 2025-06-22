<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Public\ProjectsWindowController;
use App\Http\Controllers\Public\LandingWindowController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProjectWindowController as AdminProjectWindowController;
use App\Http\Controllers\Admin\LandingWindowController as AdminLandingWindowController;


Route::get('/', [LandingWindowController::class, 'welcome'])->name('welcome');
Route::get('/biography', [LandingWindowController::class, 'biography'])->name('biography');
Route::get('/slavusworks', [LandingWindowController::class, 'slavusworks'])->name('slavusworks');
Route::get('/contact', [LandingWindowController::class, 'contact'])->name('contact');

Route::get('/desktop', function () {
    return view('public.desktop');
})->name('desktop');

Route::get('/projects', [ProjectsWindowController::class, 'projects'])->name('projectslist');
Route::get('/projects/{slug}', [ProjectsWindowController::class, 'project'])->name('projectshow');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/landing-windows', [AdminLandingWindowController::class, 'index'])->name('admin.landing-windows.index');
    Route::get('/landing-windows/create', [AdminLandingWindowController::class, 'create'])->name('admin.landing-windows.create');
    Route::post('/landing-windows', [AdminLandingWindowController::class, 'store'])->name('admin.landing-windows.store');
    Route::get('/landing-windows/{landingWindow}/edit', [AdminLandingWindowController::class, 'edit'])->name('admin.landing-windows.edit');
    Route::put('/landing-windows/{landingWindow}', [AdminLandingWindowController::class, 'update'])->name('admin.landing-windows.update');

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('projects', AdminProjectWindowController::class);
    });
});

require __DIR__.'/auth.php';

