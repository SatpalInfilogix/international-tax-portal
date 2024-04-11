<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\ExpertiseController;
use App\Http\Controllers\NewsAndEventsController;
use App\Http\Controllers\OneToOneController;
use App\Http\Controllers\ResourcesController;
use App\Http\Controllers\MemberController;
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
        'members' => MemberController::class,
        'reports' => ReportsController::class,
    ]);

    Route::get('/get-members-by-country/{country}', [MemberController::class, 'get_by_country'])->name('members.get-by-country');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/user-status', [UserController::class, 'status'])->name('user-status');
});

require __DIR__.'/auth.php';
