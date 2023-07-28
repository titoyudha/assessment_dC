<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegionController;

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

Route::get('/get-provinces', [RegionController::class, 'getProvinces']);
Route::get('/get-regencies/{provinceId}', [RegionController::class, 'getRegencies']);
Route::get('/get-districts/{cityId}', [RegionController::class, 'getDistricts']);
Route::get('/get-villages/{districtId}', [RegionController::class, 'getVillages']);
