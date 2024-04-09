<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\ExpertiseController;
use App\Http\Controllers\NewsAndEventsController;
use App\Http\Controllers\OneToOneController;
use App\Http\Controllers\ResourcesController;
use App\Http\Controllers\MembersController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resources([
        'users' => UserController::class,
        'leads' => LeadController::class,
        'expertise' => ExpertiseController::class,
        'news-and-events' => NewsAndEventsController::class,
        'one-to-one' => OneToOneController::class,
        'resources' => ResourcesController::class,
        'members' => MembersController::class,
        'reports' => ReportsController::class,
    ]);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
