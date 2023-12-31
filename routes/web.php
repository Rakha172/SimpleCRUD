<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', function() {return view('home');})->name('home')->middleware('auth');
Route::resource('users', \App\Http\Controllers\UserController::class)->middleware('auth');
Route::resource('events', \App\Http\Controllers\EventsController::class)->middleware('auth');
Route::resource('eventorganizer', \App\Http\Controllers\EventOrganizerController::class)->middleware('auth');
Route::resource('attendees', \App\Http\Controllers\AttendeesController::class)->middleware('auth');


