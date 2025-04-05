<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SportsController;
use App\Http\Controllers\Admin\SportController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\ReservationController as AdminReservationController;
use App\Http\Controllers\Admin\FieldController;





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
Route::post('/reservation', [ReservationController::class, 'confirmReservation'])->name('public.reservations.store');
// Route::post('/reservations', [ReservationController::class, 'confirmReservation'])->name('reservations.store');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile',[ProfileController::class,'index'])->name('profile.show');
Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');


//admin routes
Route::get('/admin', function () {
    return view('dashboard');
});

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('users', UserController::class)->except(['create', 'store', 'edit', 'update']);
    Route::get('/users/{user}/reservations', [UserController::class, 'reservations'])
         ->name('admin.users.reservations');
    Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
    

    Route::resource('sports', SportsController::class);
    Route::resource('reservations', ReservationController::class);
    Route::resource('news', NewsController::class);
    Route::get('/users/{user}', [UserController::class, 'show'])
         ->name('admin.users.show');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])
         ->name('admin.users.destroy');
    Route::get('/dashboard', [DashboardController::class, 'index'])
         ->name('dashboard');
    Route::get('/admin/users/export', [UserController::class, 'export'])
         ->name('admin.users.export');
    Route::get('/users/{user}/reservations', [UserController::class, 'reservations'])->name('admin.users.reservations');




    Route::resource('admins', AdminController::class)->except(['show']);
    Route::get('/admins', [AdminController::class, 'index'])->name('admin.admins.index');
    Route::get('/admins/{admin}/edit', [AdminController::class, 'edit'])->name('admin.admins.edit');
    Route::get('/admins/create', [AdminController::class, 'create'])->name('admin.admins.create');
    Route::delete('/admins/{admin}', [AdminController::class, 'destroy'])->name('admin.admins.destroy');
    Route::post('/admins', [AdminController::class, 'store'])->name('admin.admins.store');
    Route::put('/admins/{admin}', [AdminController::class, 'update'])->name('admin.admins.update');




    Route::resource('sports', SportController::class);
    Route::get('/admin/sports', [SportController::class, 'index'])->name('admin.sports.index')->middleware('admin');
    Route::get('/sports/create', [SportController::class, 'create'])->name('admin.sports.create');
    Route::get('/sports/{sport}/edit', [SportController::class, 'edit'])->name('admin.sports.edit');
    Route::delete('/sports/{sport}', [SportController::class, 'destroy'])->name('admin.sports.destroy');
    Route::put('/sports/{sport}', [SportController::class, 'update'])->name('admin.sports.update');
    Route::post('/sports', [SportController::class, 'store'])->name('admin.sports.store');




     Route::resource('news', NewsController::class);
     Route::get('/admin/news', [AdminNewsController::class, 'index'])->name('admin.news.index');
     Route::get('/admin/news/create', [AdminNewsController::class, 'create'])->name('admin.news.create');
     Route::get('/admin/news/{news}/edit', [AdminNewsController::class, 'edit'])->name('admin.news.edit');
     Route::delete('/admin/news/{news}', [AdminNewsController::class, 'destroy'])->name('admin.news.destroy');
     Route::put('/admin/news/{news}', [AdminNewsController::class, 'update'])->name('admin.news.update');
     Route::post('/admin/news', [AdminNewsController::class, 'store'])->name('admin.news.store');
     Route::get('/reservations', [AdminReservationController::class, 'index'])->name('admin.reservations.index');



     Route::resource('fields', FieldController::class);
     Route::get('/admin/fields', [FieldController::class, 'index'])->name('admin.fields.index');
     Route::get('/admin/fields/create', [FieldController::class, 'create'])->name('admin.fields.create');
     Route::get('/admin/fields/{field}/edit', [FieldController::class, 'edit'])->name('admin.fields.edit');
     Route::delete('/admin/fields/{field}', [FieldController::class, 'destroy'])->name('admin.fields.destroy');
     Route::put('/admin/fields/{field}', [FieldController::class, 'update'])->name('admin.fields.update');
     Route::post('/admin/fields', [FieldController::class, 'store'])->name('admin.fields.store');



});
