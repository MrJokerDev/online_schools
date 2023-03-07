<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\IndexController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [IndexController::class, 'index'])->name('dashboard');
    Route::post('/dashboard', [IndexController::class, 'answers'])->name('answers');
    Route::post('/dashboard/user_answers', [IndexController::class, 'user_answers'])->name('user_answers');
     Route::post('/dashboard/user_courses', [IndexController::class, 'user_courses'])->name('user_courses');
    //Route::post('/dashboard/calendar', [IndexController::class, 'calendar'])->name('calendar');
}); 

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';