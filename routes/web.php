<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HunterController;
use App\Http\Controllers\FallbackController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::controller(HunterController::class)->group(function() {
    Route::get('/', 'index');
    Route::get('/create', 'create');
    Route::get('/trash', 'trashRegister');
    Route::get('/show/{id}', 'show');
    Route::get('/update/{id}', 'edit');
    Route::get('/restore-register/{id}', 'restoreRegisterTrash');
    Route::post('/create', 'store');
    Route::patch('/update/{id}', 'update');
    Route::delete('/delete/{id}', 'destroy');
    Route::delete('/delete-register/{id}', 'destroyRegisterTrash');
    Route::get('/export-pdf','exportPDF');
    Route::get('/download-zip/{id}', 'downloadZip');
    Route::get('/download-zip-trashed/{id}', 'downloadZipRegisterTrash');
});

Route::fallback(FallbackController::class);
