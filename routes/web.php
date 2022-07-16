<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController AS AC;
use App\Http\Controllers\Suma AS Sum;
use App\Http\Controllers\ColorController AS Color;
use App\Http\Controllers\BankController AS Bank;
use App\Http\Controllers\WildAnimalController AS Animal;
use App\Http\Controllers\ToDoController as Todo;

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
//To-Do
Route::get('/todo', [Todo::class, 'index'])->name('todos_index');
Route::get('/todo/create', [Todo::class, 'create'])->name('todo_create');
Route::post('/todo', [Todo::class, 'store'])->name('todo_store');
Route::put('/todo/{todo}', [Todo::class, 'todo'])->name('todo_todo');
Route::get('/todo/show/{id}', [Todo::class, 'show'])->name('todo_show');
Route::get('/todo/edit/{todo}', [Todo::class, 'edit'])->name('todo_edit');
Route::put('/todo/update/{todo}', [Todo::class, 'update'])->name('todo_update');
Route::delete('/todo/{todo}', [Todo::class, 'destroy'])->name('todo_annihilate');
//Auth
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

