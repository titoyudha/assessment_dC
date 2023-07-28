<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
Route::get('/get-regencies/', [RegionController::class, 'getRegencies']);
Route::get('/get-districts/', [RegionController::class, 'getDistricts']);
Route::get('/get-villages/', [RegionController::class, 'getVillages']);


//Task 2
Route::get('/subscribe', function () {
    return view('subscribe');
});

Route::post('/subscribe', function (Request $request) {
    $request->validate([
        'email' => 'required|email|min:10'
    ]);

    $data = [
        'email' => $request->email,
        'ip' => $request->ip(),
        'created_at' => now()
    ];

    DB::table('subscriptions')->insert($data);

    return redirect('/subscribe')->with('success', 'Subscription successful! Thank you for subscribing.');
});
