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
Route::get('/colors', [Color::class, 'index'])->name('colors_index')->middleware('role:user');
Route::get('/colors/show/{id}', [Color::class, 'show'])->name('colors_show')->middleware('role:user');
Route::get('/colors/create', [Color::class, 'create'])->name('colors_create')->middleware('role:admin');
Route::post('/colors', [Color::class, 'store'])->name('colors_store')->middleware('role:admin');
Route::get('/colors/edit/{color}', [Color::class, 'edit'])->name('colors_edit')->middleware('role:admin');
Route::put('/colors/{color}', [Color::class, 'update'])->name('colors_update')->middleware('role:admin');
Route::delete('/colors/{color}', [Color::class, 'destroy'])->name('colors_delete')->middleware('role:admin');

//BANK:
Route::get('/bank', [Bank::class, 'index'])->name('bank_index')->middleware('role:bankUser');
Route::get('/bank/create', [Bank::class, 'create'])->name('bank_create')->middleware('role:bankAdmin');
Route::post('/bank', [Bank::class, 'store'])->name('bank_store')->middleware('role:bankAdmin');
Route::get('/bank/edit/{bank}', [Bank::class, 'edit'])->name('account_edit')->middleware('role:bankAdmin');
Route::put('/bank/{bank}', [Bank::class, 'update'])->name('bank_update')->middleware('role:bankAdmin');
Route::delete('/bank/{bank}', [Bank::class, 'destroy'])->name('account_delete')->middleware('role:bankAdmin');
Route::get('/bank/transfer/{bank}', [Bank::class, 'transfer'])->name('bank_transfer')->middleware('role:bankAdmin');
Route::put('/bank/transfer/{bank}', [Bank::class, 'transferDo'])->name('transfer_do')->middleware('role:bankAdmin');
//Animal
Route::get('/animals', [Animal::class, 'index'])->name('animals_index')->middleware('role:user');
Route::get('/animals/create', [Animal::class, 'create'])->name('animals_create')->middleware('role:admin');
Route::post('/animals', [Animal::class, 'store'])->name('animals_store')->middleware('role:admin');
Route::get('/animals/show/{id}', [Animal::class,'show'])->name('animal_show')->middleware('role:user');
Route::get('/animal/edit/{animal}', [Animal::class, 'edit'])->name('animal_edit')->middleware('role:admin');
Route::delete('/animal/{animal}', [Animal::class, 'destroy'])->name('animal_kill')->middleware('role:admin');
Route::put('/animal/{animal}', [Animal::class, 'update'])->name('animal_update')->middleware('role:admin');
//To-Do
Route::get('/todo', [Todo::class, 'index'])->name('todos_index')->middleware('role:user');
Route::get('/todo/create', [Todo::class, 'create'])->name('todo_create')->middleware('role:admin');
Route::post('/todo', [Todo::class, 'store'])->name('todo_store')->middleware('role:admin');
Route::put('/todo/{todo}', [Todo::class, 'todo'])->name('todo_todo')->middleware('role:admin');
Route::get('/todo/show/{id}', [Todo::class, 'show'])->name('todo_show')->middleware('role:user');
Route::get('/todo/edit/{todo}', [Todo::class, 'edit'])->name('todo_edit')->middleware('role:admin');
Route::put('/todo/update/{todo}', [Todo::class, 'update'])->name('todo_update')->middleware('role:admin');
Route::delete('/todo/{todo}', [Todo::class, 'destroy'])->name('todo_annihilate')->middleware('role:admin');
//Auth
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

