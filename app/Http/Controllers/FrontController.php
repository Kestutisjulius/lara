<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;
use App\Models\WildAnimal as Animal;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    public function index(Request $request){

        if ($request->s)
        {

        list($w1, $w2) = explode(' ', $request->s.' ');


            $animalsDir = [DB::table('wild_animals')
                ->join('colors', 'colors.id', '=', 'wild_animals.color_id')
                ->select('colors.*', 'wild_animals.*')
                ->where('colors.title', 'like', '%'.$w1.'%')
                ->where('wild_animals.name', 'like', '%'.$w2.'%')
                ->orWhere(function ($query) use ($w1, $w2){
                    $query
                        ->where('colors.title', 'like', '%'.$w2.'%')
                        ->where('wild_animals.name', 'like', '%'.$w1.'%');
                })

                ->orderBy('wild_animals.name', 'asc')
                ->get(), 'default'];
            $filter = 0;

        } else {
            if (!$request->color_id) {
                $animalsDir = match ($request->sort) {
                    'color-asc' => [DB::table('wild_animals')
                        ->join('colors', 'colors.id', '=', 'wild_animals.color_id')
                        ->select('colors.*', 'wild_animals.*')
                        ->orderBy('colors.title', 'asc')
                        ->orderBy('wild_animals.name', 'desc')
                        ->get(), 'color-asc'],
                    'color-desc' => [DB::table('wild_animals')
                        ->join('colors', 'colors.id', '=', 'wild_animals.color_id')
                        ->select('colors.*', 'wild_animals.*')
                        ->orderBy('colors.title', 'desc')
                        ->orderBy('wild_animals.name', 'desc')
                        ->get(), 'color-desc'],
                    'animal-asc' => [DB::table('wild_animals')
                        ->join('colors', 'colors.id', '=', 'wild_animals.color_id')
                        ->select('colors.*', 'wild_animals.*')
                        ->orderBy('wild_animals.name', 'asc')
                        ->orderBy('colors.title', 'asc')
                        ->get(), 'animal-asc'],
                    'animal-desc' => [DB::table('wild_animals')
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
                $filter = 0;
            } else {

                $animalsDir = match ($request->sort) {
                    'color-asc' => [DB::table('wild_animals')
                        ->join('colors', 'colors.id', '=', 'wild_animals.color_id')
                        ->select('colors.*', 'wild_animals.*')
                        ->where('wild_animals.color_id', $request->color_id)
                        ->orderBy('colors.title', 'asc')
                        ->get(), 'color-asc'],
                    'color-desc' => [DB::table('wild_animals')
                        ->join('colors', 'colors.id', '=', 'wild_animals.color_id')
                        ->select('colors.*', 'wild_animals.*')
                        ->where('wild_animals.color_id', '=', $request->color_id)
                        ->orderBy('wild_animals.name', 'desc')
                        ->get(), 'color-desc'],
                    'animal-asc' => [DB::table('wild_animals')
                        ->join('colors', 'colors.id', '=', 'wild_animals.color_id')
                        ->select('colors.*', 'wild_animals.*')
                        ->orderBy('wild_animals.name', 'asc')
                        ->where('wild_animals.color_id', '=', $request->color_id)
                        ->get(), 'animal-asc'],
                    'animal-desc' => [DB::table('wild_animals')
                        ->join('colors', 'colors.id', '=', 'wild_animals.color_id')
                        ->select('colors.*', 'wild_animals.*')
                        ->orderBy('wild_animals.name', 'desc')
                        ->where('wild_animals.color_id', '=', $request->color_id)
                        ->get(), 'animal-desc'],
                    default => [DB::table('wild_animals')
                        ->join('colors', 'colors.id', '=', 'wild_animals.color_id')
                        ->select('colors.*', 'wild_animals.*')
                        ->where('wild_animals.color_id', '=', $request->color_id)
                        ->get(), 'default']
                };
                $filter = (int)$request->color_id;
            }
        }

        return view('front.index', [
            'animals'=>$animalsDir[0],
            'sort'=>$animalsDir[1],
            'colors'=>Color::all(),
            'filter'=>$filter,
            's'=>$request->s ?? ''
        ]);
    }
}
