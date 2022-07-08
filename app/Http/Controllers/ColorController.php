<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{

    public function index() //READ -> GET/All
    {
        $colors = Color::all();
        return view('color.index', ['colors' => $colors]);
    }

    public function create() //FORM-GET
    {
        return view('color.create');
    }

    public function store(Request $request) //CREATE-POST {BODY}
    {
        $color = new Color;
        $color->color = $request->create_color_input;
        $color->save();
        return redirect()->route('colors_index');
    }

    public function show(Color $color) //READ -> GET/ONE {param}
    {
        //
    }

    public function edit(Color $color) //GET {param}
    {
        return view('color.edit', ['color'=> $color]);
    }

    public function update(Request $request, Color $color) //PUT - UPDATE {body/param}
    {
        $color->color = $request->create_color_input;
        $color->save();
        return redirect()->route('colors_index');
    }


    public function destroy(Color $color) //POST - DELETE{param}
    {
        $color->delete();
        return redirect()->route('colors_index');
    }
}
