<?php

namespace App\Http\Controller\HunterController;
namespace App\Http\Controller\MasterController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HunterController;

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

Route::get('/', function () {
    return view('welcome');
});

// Route::resource("/hunter", HunterController::class);

Route::controller(HunterController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/create', 'create');
    Route::get('/update/{id}', 'edit');
    // Undefined variable $hunter
    Route::post('create', 'store');
    // The PATCH method is not supported for this route. Supported methods: GET, HEAD, POST.
    Route::patch('/update/{id}', 'update');
    // The GET method is not supported for this route. Supported methods: DELETE.
    Route::delete('/delete/{id}', 'destroy'); 
});