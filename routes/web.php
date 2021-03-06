<?php

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

Route::get('/', function () {
    return view("home");
});
Route::get('/newDrugRefill', function (){
    return view('arvRefill.newRefill');
}

);
Route::get('listDrugRefill', 'App\Http\Controllers\ArvRefillController@index');
Route::post('filterRefillByDates', 'App\Http\Controllers\ArvRefillController@filterRefillsByDates');

Route::post('/postNewDrugRefill', 'App\Http\Controllers\ArvRefillController@store');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
