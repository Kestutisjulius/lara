<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\WildAnimal as Animal;
use App\Http\Requests\UpdateWildAnimalRequest;
use Illuminate\Http\Request;

class WildAnimalController extends Controller
{
    public function index(Request $request)
    {
        $animals = match ($request->sort)
        {
            'asc' => Animal::orderBy('name', 'asc')->get(),
            'desc' => Animal::orderBy('name', 'desc')->get(),
            default => Animal::all()
        };
        return view('animal.index', ['animals'=> $animals]);
    }

    public function create()
    {

        return view('animal.create', ['colors'=>Color::all()]);
    }

    public function store(Request $request)
    {
        $animal = new Animal;

        $animal->name = $request->animal_name;

        $animal->color_id = $request->color_id;

        $animal->save();

        return redirect()->route('animals_index')->with('success', 'Animal are saved!');
    }

    public function show(int $animal_id)
    {
        $color = Color::where('id', $animal_id)->first();
        $animal = Animal::where('id', $animal_id)->first();
        return view('animal.show', ['color' => $color, 'animal'=> $animal]);
    }

    public function edit(Animal $animal)
    {
        $colors = Color::all();

        return view('animal.edit', [
            'animal' => $animal,
            'colors' => $colors
        ]);
    }

    public function update(Request $request, Animal $animal)
    {

        $animal->name = $request->animal_name;

        $animal->color_id = $request->color_id;

        $animal->save();

        return redirect()->route('animals_index')->with('success', 'updated beast!');
    }

    public function destroy(Animal $animal)
    {
        $animal->delete();

        return redirect()->route('animals_index')->with('deleted', 'Animal is dead :(');
    }
}
