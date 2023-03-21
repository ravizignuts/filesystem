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

// Route::get('/', function () {
//     return view('multiuploads');
// });

Route::controller(UploadFileController::class)->group(function(){
    Route::get('/','uploadForm');
    Route::post('multiuploads','uploadSubmit');
    Route::get('show','showAll')->name('home');
    Route::get('delete/{id}','delete')->name('delete');
});
