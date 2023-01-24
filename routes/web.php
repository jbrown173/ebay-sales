<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RazorsCRUDController;
use App\Http\Controllers\BrandsCRUDController;
use App\Http\Controllers\EbaylistingsCRUDController;
use App\Http\Controllers\ManufacturersCRUDController;
use App\Http\Controllers\WhetstonesCRUDController;
use App\Http\Controllers\WorkdoneCRUDController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AdminAuthController;

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

Route::resource('razors', RazorsCRUDController::class);
Route::resource('brands', BrandsCRUDController::class);
Route::resource('ebaylistings', EbaylistingsCRUDController::class);
Route::resource('manufacturers', ManufacturersCRUDController::class);
Route::resource('whetstones', WhetstonesCRUDController::class);
Route::resource('workdone', WorkdoneCRUDController::class);

