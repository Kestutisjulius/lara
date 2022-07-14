<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController AS AC;
use App\Http\Controllers\Suma AS Sum;
use App\Http\Controllers\ColorController AS Color;
use App\Http\Controllers\BankController AS Bank;
use App\Http\Controllers\WildAnimalController AS Animal;

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
Route::get('/colors/show/{id}', [Color::class, 'show'])->name('colors_show');
Route::get('/colors/create', [Color::class, 'create'])->name('colors_create');
Route::post('/colors', [Color::class, 'store'])->name('colors_store');
Route::get('/colors/edit/{color}', [Color::class, 'edit'])->name('colors_edit');
Route::put('/colors/{color}', [Color::class, 'update'])->name('colors_update');
Route::delete('/colors/{color}', [Color::class, 'destroy'])->name('colors_delete');

//BANK:
Route::get('/bank', [Bank::class, 'index'])->name('bank_index');
Route::get('/bank/create', [Bank::class, 'create'])->name('bank_create');
Route::post('/bank', [Bank::class, 'store'])->name('bank_store');
Route::get('/bank/edit/{bank}', [Bank::class, 'edit'])->name('account_edit');
Route::put('/bank/{bank}', [Bank::class, 'update'])->name('bank_update');
Route::delete('/bank/{bank}', [Bank::class, 'destroy'])->name('account_delete');
Route::get('/bank/transfer/{bank}', [Bank::class, 'transfer'])->name('bank_transfer');
Route::put('/bank/transfer/{bank}', [Bank::class, 'transferDo'])->name('transfer_do');
//Animal
Route::get('/animals', [Animal::class, 'index'])->name('animals_index');
Route::get('/animals/create', [Animal::class, 'create'])->name('animals_create');
Route::post('/animals', [Animal::class, 'store'])->name('animals_store');
Route::get('/animals/show/{id}', [Animal::class,'show'])->name('animal_show');
Route::get('/animal/edit/{animal}', [Animal::class, 'edit'])->name('animal_edit');
Route::delete('/animal/{animal}', [Animal::class, 'destroy'])->name('animal_kill');
Route::put('/animal/{animal}', [Animal::class, 'update'])->name('animal_update');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
