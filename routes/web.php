<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SportsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminController;



//public routes

Auth::routes();
Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [NewsController::class, 'index'])->name('welcome');
Route::get('/sports', [SportsController::class, 'index']);
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');
Route::get('/about',[PageController::class,'about'])->name('about');
Route::get('/reservation',[ReservationController::class,'index'])->name('reservation.index');
Route::post('/search-sports', [ReservationController::class, 'search'])->name('search.sports');
Route::post('/reservation', [ReservationController::class, 'confirmReservation'])->name('reservations.store');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile',[ProfileController::class,'index'])->name('profile.show');


// admin routes
Route::get('/admin', function () {
    return view('dashboard');
});

// Route::middleware(['auth', 'admin'])->group(function () {
//     Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
//     Route::get('/admin/users', [AdminController::class, 'indexUser'])->name('admin.users.index');
//     Route::get('/admin/users/{id}', [AdminController::class, 'show'])->name('admin.users.show');
//     Route::delete('/admin/users/{id}', [AdminController::class, 'destroy'])->name('admin.users.destroy');
// });

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');