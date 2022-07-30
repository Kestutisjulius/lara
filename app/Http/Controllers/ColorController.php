<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ColorController extends Controller
{
    public function index(Request $request) //READ -> GET/All
    {

        // $colors = Color::all()->sortByDesc('title');
        // $colors = Color::orderBy('title')->get();
        // $colors = Color::orderBy('title')->where('id','!=', '2')->get();
        $colors = match ($request->sort)
        {
            'asc' => Color::orderBy('title', 'asc')->get(),
            'desc' => Color::orderBy('title', 'desc')->get(),

            default => Color::all()
        };
        return view('color.index', ['colors' => $colors]);
    }

    public function create() //FORM-GET
    {
        return view('color.create');
    }

    public function store(Request $request) //CREATE-POST {BODY}
    {
        $validator = Validator::make($request->all(),
            [
                'color_title' => ['required', 'min:3', 'max:88']
            ],
            [
                'required' => 'a pavadinimas kur ?!',
                'min' => 'biski daugiau nei du simboliai turi but ;)',
                'max' => 'biski maziau nei 19 simboliai turi but ;)',
            ]
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }

        $color = new Color;
        $color->color = $request->create_color_input;
        $color->title = $request->color_title;
        $color->save();
        return redirect()->route('colors_index')->with('success', 'WINNER! creates nice color');
    }

    public function show(int $colorId) //READ -> GET/ONE {param}
    {
        $color = Color::where('id', $colorId)->first();
        return view('color.show', ['color'=> $color]);
    }

    public function edit(Color $color) //GET {param}
    {
        return view('color.edit', ['color'=> $color]);
    }

    public function update(Request $request, Color $color) //PUT - UPDATE {body/param}
    {

        $validator = Validator::make($request->all(),
            [
                'color_title' => ['required', 'min:3', 'max:88']
            ],
            [
                'required' => 'a pavadinimas kur ?!',
                'min' => 'biski daugiau nei du simboliai turi but ;)',
                'max' => 'biski maziau nei 19 simboliai turi but ;)',
            ]
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }

        $color->color = $request->create_color_input;
        $color->title = $request->color_title ?? 'no title';
        $color->save();
        return redirect()->route('colors_index');
    }


    public function destroy(Color $color) //POST - DELETE{param}
    {
        if (!$color->animals->count()) //need many to one in Models color
        {
        $color->delete();
        return redirect()->route('colors_index')->with('deleted', '!Color gone');
        }
        return redirect()->back()->with('deleted', 'nea');


    }
    public function link(){
        abort(403);
    }
}
