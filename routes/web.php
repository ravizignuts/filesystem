<?php

use App\Http\Controllers\UploadFileController;
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

Route::controller(UploadFileController::class)->group(function(){
    Route::get('multiuploads','uploadForm');
    Route::post('multiuploads','uploadSubmit');
    Route::get('show','showAll')->name('home');
});
