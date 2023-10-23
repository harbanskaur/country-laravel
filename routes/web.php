<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\website;
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

Route::get('/',[website::class,'index']);
Route::post('/getState',[website::class,'getState']);
Route::post('/getCity',[website::class,'getCity']);
