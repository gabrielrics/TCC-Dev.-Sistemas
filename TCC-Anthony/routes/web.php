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
Route::get('/entry', function () {
    return view('auth.entry');
});
Route::post('/entry', [AuthController::class, 'login'])->name('login.post');
Route::post('/entry', [AuthController::class, 'signUp'])->name('signup.post');