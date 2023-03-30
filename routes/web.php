<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\IndexController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect('login');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [IndexController::class, 'index'])->name('dashboard');
    Route::post('/dashboard', [IndexController::class, 'answers'])->name('answers');
    Route::get('/dashboard/courses_info', [IndexController::class, 'courses_info'])->name('courses_info');
    Route::post('/dashboard/user_answers', [IndexController::class, 'user_answers'])->name('user_answers');
    Route::post('/dashboard/user_courses', [IndexController::class, 'user_courses'])->name('user_courses');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';