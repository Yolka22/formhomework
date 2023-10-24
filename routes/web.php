<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\ReviewController;
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
    return view('home');
});

Route::get('/zooform', [FormController::class,"index"]);
Route::post('/submit-form', [FormController::class, 'processForm']);

Route::get('/home/stat', [ReviewController::class,"showHome"]);
Route::get('/reviews', [ReviewController::class,"index"]);
Route::post('/reviews', [ReviewController::class,"store"]);