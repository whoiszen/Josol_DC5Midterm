<?php

use App\Http\Controllers\JobPostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/about-page', function () {
    return Inertia::render('AboutPage');
})->name('about-page');

Route::get('/available-jobs', [JobPostController::class, 'index'])
    ->middleware('auth')
    ->name('jobs.available');

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [JobPostController::class, 'dashboard'])
        ->name('dashboard');

    Route::get('/jobposts/create', [JobPostController::class, 'create'])
        ->name('jobposts.create');

    Route::post('/jobposts', [JobPostController::class, 'store'])
        ->name('jobposts.store');
});

require __DIR__.'/auth.php';
