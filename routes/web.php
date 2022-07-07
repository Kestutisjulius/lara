<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController AS AC;
use App\Http\Controllers\Suma AS Sum;
use App\Http\Controllers\ColorController AS Color;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/bebras', fn()=>'bebrams Valio');
Route::get('/barsukas', [AC::class, 'barsukas']);
Route::get('/briedis/{id}', [AC::class, 'briedis']);
Route::get('/suma/{s1}/{s2?}', [Sum::class, 'suma']);

Route::get('/skirtumas', [Sum::class, 'skirtumas'])->name('forma');
Route::post('/skirtumas', [Sum::class, 'skaiciuoti'])->name('skaiciuokle');
//COLOR:
Route::get('/colors', [Color::class, 'index'])->name('colors_index');
Route::get('/colors/create', [Color::class, 'create']);
Route::post('/colors', [Color::class, 'store'])->name('colors_store');
Route::get('/colors/edit/{color}', [Color::class, 'edit'])->name('colors_edit');
Route::put('/colors/{color}', [Color::class, 'update'])->name('colors_update');
