<?php

use App\Http\Controllers\BrandsController;
use Illuminate\Support\Facades\Route;

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


Route::get('/', [BrandsController::class, 'create']);
Route::get('/list', [BrandsController::class, 'list']);
Route::post('/', [BrandsController::class, 'store']);
