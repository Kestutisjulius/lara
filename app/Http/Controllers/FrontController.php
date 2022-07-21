<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WildAnimal as Animal;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    public function index(Request $request){
        $animalsDir = match ($request->sort)
        {
            'color-asc'=>[DB::table('wild_animals')
                            ->join('colors', 'colors.id', '=', 'wild_animals.color_id')
                            ->select('colors.*', 'wild_animals.*')
                            ->orderBy('colors.title', 'asc')
                            ->orderBy('wild_animals.name', 'desc')
                            ->get(), 'color-asc'],
            'color-desc'=>[DB::table('wild_animals')
                            ->join('colors', 'colors.id', '=', 'wild_animals.color_id')
                            ->select('colors.*', 'wild_animals.*')
                            ->orderBy('colors.title', 'desc')
                            ->orderBy('wild_animals.name', 'desc')
                            ->get(), 'color-desc'],
            'animal-asc'=>[DB::table('wild_animals')
                            ->join('colors', 'colors.id', '=', 'wild_animals.color_id')
                            ->select('colors.*', 'wild_animals.*')
                            ->orderBy('wild_animals.name', 'asc')
                            ->orderBy('colors.title', 'asc')
                            ->get(), 'animal-asc'],
            'animal-desc'=>[DB::table('wild_animals')
                            ->join('colors', 'colors.id', '=', 'wild_animals.color_id')
                            ->select('colors.*', 'wild_animals.*')
                            ->orderBy('wild_animals.name', 'desc')
                            ->orderBy('colors.title', 'asc')
                            ->get(), 'animal-desc'],
            default => [DB::table('wild_animals')
                ->join('colors', 'colors.id', '=', 'wild_animals.color_id')
                ->select('colors.*', 'wild_animals.*')
                ->get()->shuffle(), 'default']
        };


        return view('front.index', [
            'animals'=>$animalsDir[0],
            'sort'=>$animalsDir[1]
        ]);
    }
}
