<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\NewsController;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


use App\Http\Controllers\SportsController;
use App\Http\Controllers\ContactController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [NewsController::class, 'index']);

Route::get('/sports', [SportsController::class, 'index']);


Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');


//public routes
// Route::get('/contact',[PageController::class,'contact'])->name('contact');
Route::get('/about',[PageController::class,'about'])->name('about');
// Route::get('/sports',[PageController::class,'sports'])->name('sports');
Route::get('/reservation',[PageController::class,'reservation'])->name('reservation');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
