<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WildAnimal as Animal;

class FrontController extends Controller
{
    public function index(){
        $animals = Animal::all();
        return view('front.index', ['animals'=>$animals]);
    }
}
