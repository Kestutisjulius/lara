<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController AS AC;
use App\Http\Controllers\Suma AS Sum;
use App\Http\Controllers\ColorController AS Color;
use App\Http\Controllers\BankController AS Bank;
use App\Http\Controllers\WildAnimalController AS Animal;
use App\Http\Controllers\ToDoController as Todo;
use App\Http\Controllers\UserController as U;
use App\Http\Controllers\FrontController as Front;

Route::get('/welcome', function () {
    return view('welcome');
});
//FRONT
Route::get('/', [Front::class, 'index'] )->name('front_index');
//ANY
Route::get('/bebras', fn()=>'bebrams Valio');
Route::get('/barsukas', [AC::class, 'barsukas']);
Route::get('/briedis/{id}', [AC::class, 'briedis']);
Route::get('/suma/{s1}/{s2?}', [Sum::class, 'suma']);
Route::get('/skirtumas', [Sum::class, 'skirtumas'])->name('forma');
Route::post('/skirtumas', [Sum::class, 'skaiciuoti'])->name('skaiciuokle');
//COLOR:
Route::prefix('colors')->name('colors_')->group(function (){
    Route::get('', [Color::class, 'index'])->name('index')->middleware('role:user');
    Route::get('show/{id}', [Color::class, 'show'])->name('show')->middleware('role:user');
    Route::get('create', [Color::class, 'create'])->name('create')->middleware('role:admin');
    Route::post('', [Color::class, 'store'])->name('store')->middleware('role:admin');
    Route::get('edit/{color}', [Color::class, 'edit'])->name('edit')->middleware('role:admin');
    Route::put('{color}', [Color::class, 'update'])->name('update')->middleware('role:admin');
    Route::delete('{color}', [Color::class, 'destroy'])->name('delete')->middleware('role:admin');
});
//BANK:
Route::prefix('bank')->name('bank_')->group(function (){
    Route::get('', [Bank::class, 'index'])->name('index')->middleware('role:bankUser');
    Route::get('create', [Bank::class, 'create'])->name('create')->middleware('role:bankAdmin');
    Route::post('', [Bank::class, 'store'])->name('store')->middleware('role:bankAdmin');
    Route::get('edit/{bank}', [Bank::class, 'edit'])->name('edit')->middleware('role:bankAdmin');
    Route::put('{bank}', [Bank::class, 'update'])->name('update')->middleware('role:bankAdmin');
    Route::delete('{bank}', [Bank::class, 'destroy'])->name('delete')->middleware('role:bankAdmin');
    Route::get('transfer/{bank}', [Bank::class, 'transfer'])->name('transfer')->middleware('role:bankAdmin');
    Route::put('transfer/{bank}', [Bank::class, 'transferDo'])->name('do')->middleware('role:bankAdmin');
});
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
//USER
Route::get('/user/create', [U::class, 'create'])->name('user_create')->middleware('role:admin');
Route::post('/user', [U::class, 'store'])->name('user_store')->middleware('role:admin');
Route::get('/users', [U::class, 'index'])->name('users_index')->middleware('role:admin');
Route::get('/user/edit/{user}', [U::class, 'edit'])->name('user_edit')->middleware('role:admin');
Route::put('/user/update/{user}', [U::class, 'update'])->name('user_update')->middleware('role:admin');
Route::delete('/user/{user}', [U::class, 'destroy'])->name('user_delete')->middleware('role:admin');
//Auth
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

