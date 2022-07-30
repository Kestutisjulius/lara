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
            default => Animal::orderBy('id', 'desc')->get()
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
        //ANIMAL PHOTO
        if ($request->file('animal_photo'))
        {
            $photo = $request->file('animal_photo');
            $ext = $photo->getClientOriginalExtension();
            $name = pathinfo($photo->getClientOriginalName(), PATHINFO_FILENAME);

            $file = $name.'-'.time().'.'.$ext;
            //$image = Image::make($photo);
        }
        $photo->move(public_path().'/images', $file); //path TO directory

        $animal->photo = asset('/images'.'/'.$file); //url ON DB

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
        if ($request->file('animal_photo'))
        {
            //-----------------------------DELETE OLD-PHOTO file
            $name = pathinfo($animal->photo, PATHINFO_FILENAME);
            $extension = pathinfo($animal->photo, PATHINFO_EXTENSION);
            $file = public_path().'/images'.'/'.$name.'.'.$extension;
            if (file_exists($file))
            {
                unlink($file);
            }
            //------------------------------

            $photo = $request->file('animal_photo');
            $ext = $photo->getClientOriginalExtension();
            $name = pathinfo($photo->getClientOriginalName(), PATHINFO_FILENAME);

            $file = $name.'-'.time().'.'.$ext;
        }
        $photo->move(public_path().'/images', $file); //path TO directory

        $animal->photo = asset('/images'.'/'.$file); //url ON DB


        $animal->name = $request->animal_name;

        $animal->color_id = $request->color_id;

        $animal->save();

        return redirect()->route('animals_index')->with('success', 'updated beast!');
    }
    public function deletePicture(Animal $animal)
    {
        $name = pathinfo($animal->photo, PATHINFO_FILENAME);
        $extension = pathinfo($animal->photo, PATHINFO_EXTENSION);

        $file = public_path().'/images'.'/'.$name.'.'.$extension;

        if (file_exists($file))
        {
            unlink($file);
        }

        $animal->photo = null;
        $animal->save();

        return redirect()->back()->with('deleted', 'photo out successfully!');
    }

    public function destroy(Animal $animal)
    {
        //-----------------------------DELETE OLD-PHOTO file

        if ($animal->photo) {
            $name = pathinfo($animal->photo, PATHINFO_FILENAME);
            $extension = pathinfo($animal->photo, PATHINFO_EXTENSION);
            $file = public_path().'/images'.'/'.$name.'.'.$extension;

            if (file_exists($file)) {
                unlink($file);
            }
            //------------------------------
        }
        $animal->delete();

        return redirect()->route('animals_index')->with('deleted', 'Animal is dead :(');
    }
}
