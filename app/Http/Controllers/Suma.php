<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Color;

class Suma extends Controller
{
    public function suma($a=0, $b=0)
    {
        $ab = $a + $b;

        return view('suma', ['rezultatas' => $ab]);
    }
    public function skirtumas(Request $request)
    {
        $colors = Color::all();

        $rodyti = $request->session()->get('res', ''); //pasiimti is sesijos su get
      //  $rodyti = $request->session()->pull('res', ''); //pasiimti is sesijos ir istrinti

        return view('post.form', [
            'ro'=>$rodyti,
            'colors' => $colors
        ]);
    }

    public function skaiciuoti(Request $request)
    {
        $res = $request->x - $request->y;
        $color = new Color;
        $color->doMagic();
        $color->color = $res;
        $color->save();
        //$request->session()->put('res', $res); //sesija PUT ilgalaike
        //$request->session()->flash('res', $res); //sesija flash vienkartine
        return redirect()->route('forma')->with('res', $res); //with -> tapati sesija flash/atitikmuo
    }
}
