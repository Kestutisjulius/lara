<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public function barsukas()
    {
        return 'BARSUKAMS hooray!';
    }
    public function briedis(Request $request, $aidysas)
    {
        dump($aidysas);
        return 'Valio briedams';
    }
}
