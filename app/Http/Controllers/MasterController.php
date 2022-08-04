<?php

namespace App\Http\Controllers;

use App\Models\Master;
use App\Models\Skill;
use Illuminate\Http\Request;

class MasterController extends Controller
{

    public function index()
    {
        $masters = Master::orderBy('master_name')->get();


        $masters = $masters->sort(fn($a, $b) => $b->skills()->count() <=> $a->skills()->count());

        return view('master.index', ['masters'=>$masters]);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Master $master)
    {
        //
    }


    public function edit(Master $master)
    {
        $skills = Skill::all();
        $has = $master->skills->pluck('id')->toArray();

        $skills = $skills->map(function($s) use($has) {
            $s->has = in_array($s->id, $has);
            return $s;
        });

        return view('master.edit', ['master'=>$master, 'skills'=>$skills]);
    }

    public function update(Request $request, Master $master)
    {
        $master->skills()->detach();
        $master->skills()->attach($request->skill);

            return redirect()->route('show_masters');
    }


    public function destroy(Master $master)
    {
        $master->delete();
        return redirect()->route('show_masters');
    }
}
