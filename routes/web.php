<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProgressController;
use App\Models\Progress;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Fortify\Features;

Route::get('/', function () {
    return Inertia::render('welcome', [
        'canRegister' => Features::enabled(Features::registration()),
    ]);
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');

    Route::get('/progress', [ProgressController::class, 'index'])->name('progress.index');
    Route::get('/progress/create', [ProgressController::class, 'create'])->name('progress.create');
    Route::get('/progress/{progress}/edit', [ProgressController::class, 'edit'])->name('progress.edit');
    Route::put('/progress/{progress}', [ProgressController:: class, 'update'])->name('progress.update');
    Route::get('/progress/complete', [ProgressController::class, 'complete'])->name('progress.complete');
    Route::post('/progress/update-current-progress', [ProgressController:: class, 'updateCurrentProgress'])->name('progress.update-current-progress');
    Route::post('/progress/create' , [ProgressController:: class, 'store'])->name('progress.store');
    Route::delete('/progress/{id}', [ProgressController::class, 'destroy'])->name('progress.destroy');
    
    Route::get('/test', [ProgressController:: class, 'test'])->name('test.index'); // for tests
});

require __DIR__.'/settings.php';
