<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Suma extends Controller
{
    public function suma($a=0, $b=0)
    {
        $ab = $a + $b;
        dump($ab);
        return view('suma', ['rezultatas' => $ab]);
    }
}
