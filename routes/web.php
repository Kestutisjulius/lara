<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController AS AC;
use App\Http\Controllers\Suma AS Sum;
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

Route::get('/bebras', fn()=>'bebrams Valio');
Route::get('/barsukas', [AC::class, 'barsukas']);
Route::get('/briedis/{id}', [AC::class, 'briedis']);
Route::get('/suma/{s1}/{s2?}', [Sum::class, 'suma']);

Route::get('/skirtumas', [Sum::class, 'skirtumas'])->name('forma');
Route::post('/skirtumas', [Sum::class, 'skaiciuoti'])->name('skaiciuokle');

