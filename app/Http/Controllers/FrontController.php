<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;
use App\Models\WildAnimal as Animal;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    private $perPage = 5;

    public function index(Request $request){

        $page = $request->page ?? 1;

        if ($request->s)
        {
        list($w1, $w2) = explode(' ', $request->s.' ');

            $allCount = DB::table('wild_animals')
                ->join('colors', 'colors.id', '=', 'wild_animals.color_id')
                ->select(DB::raw('count(wild_animals.id) AS animals_count, count(DISTINCT(wild_animals.name)) AS animals_names'))
                ->where('colors.title', 'like', '%'.$w1.'%')
                ->where('wild_animals.name', 'like', '%'.$w2.'%')
                ->orWhere(function ($query) use ($w1, $w2){
                    $query
                        ->where('colors.title', 'like', '%'.$w2.'%')
                        ->where('wild_animals.name', 'like', '%'.$w1.'%');
                })
                ->orWhere(function ($query) use ($w1, $w2){
                    $query
                        ->where('wild_animals.name', 'like', '%'.$w2.'%')
                        ->where('wild_animals.name', 'like', '%'.$w1.'%');
                })
                ->first()->animals_count;

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
                ->orWhere(function ($query) use ($w1, $w2){
                    $query
                        ->where('wild_animals.name', 'like', '%'.$w2.'%')
                        ->where('wild_animals.name', 'like', '%'.$w1.'%');
                })

                ->orderBy('wild_animals.name', 'asc')
                ->offset(($page - 1)*$this->perPage)
                ->limit($this->perPage)
                ->get(), 'default'];
            $filter = 0;

        } else {
            if (!$request->color_id) {

                $allCount = DB::table('wild_animals')
                    ->select(DB::raw('count(wild_animals.id) AS animals_count, count(DISTINCT(wild_animals.name)) AS animals_names'))
                    ->first()->animals_count;

                $animalsDir = match ($request->sort) {
                    'color-asc' => [DB::table('wild_animals')
                        ->join('colors', 'colors.id', '=', 'wild_animals.color_id')
                        ->select('colors.*', 'wild_animals.*')
                        ->orderBy('colors.title', 'asc')
                        ->orderBy('wild_animals.name', 'desc')
                        ->offset(($page - 1)*$this->perPage)
                        ->limit($this->perPage)
                        ->get(), 'color-asc'],
                    'color-desc' => [DB::table('wild_animals')
                        ->join('colors', 'colors.id', '=', 'wild_animals.color_id')
                        ->select('colors.*', 'wild_animals.*')
                        ->orderBy('colors.title', 'desc')
                        ->orderBy('wild_animals.name', 'desc')
                        ->offset(($page - 1)*$this->perPage)
                        ->limit($this->perPage)
                        ->get(), 'color-desc'],
                    'animal-asc' => [DB::table('wild_animals')
                        ->join('colors', 'colors.id', '=', 'wild_animals.color_id')
                        ->select('colors.*', 'wild_animals.*')
                        ->orderBy('wild_animals.name', 'asc')
                        ->orderBy('colors.title', 'asc')
                        ->offset(($page - 1)*$this->perPage)
                        ->limit($this->perPage)
                        ->get(), 'animal-asc'],
                    'animal-desc' => [DB::table('wild_animals')
                        ->join('colors', 'colors.id', '=', 'wild_animals.color_id')
                        ->select('colors.*', 'wild_animals.*')
                        ->orderBy('wild_animals.name', 'desc')
                        ->orderBy('colors.title', 'asc')
                        ->offset(($page - 1)*$this->perPage)
                        ->limit($this->perPage)
                        ->get(), 'animal-desc'],
                    default => [DB::table('wild_animals')
                        ->join('colors', 'colors.id', '=', 'wild_animals.color_id')
                        ->select('colors.*', 'wild_animals.*')
                        ->offset(($page - 1)*$this->perPage)
                        ->limit($this->perPage)
                        ->get()->shuffle(), 'default']
                };
                $filter = 0;
            } else {
                        //colorsCount

                $allCount = DB::table('wild_animals')
                        ->join('colors', 'colors.id', '=', 'wild_animals.color_id')
                        ->select(DB::raw('count(wild_animals.id) AS animals_count, count(DISTINCT(wild_animals.name)) AS animals_names'))
                        ->where('wild_animals.color_id', $request->color_id)
                        ->first()->animals_count;

                $animalsDir = match ($request->sort) {
                    'color-asc' => [DB::table('wild_animals')
                        ->join('colors', 'colors.id', '=', 'wild_animals.color_id')
                        ->select('colors.*', 'wild_animals.*')
                        ->where('wild_animals.color_id', $request->color_id)
                        ->orderBy('colors.title', 'asc')
                        ->offset(($page - 1)*$this->perPage)
                        ->limit($this->perPage)
                        ->get(), 'color-asc'],
                    'color-desc' => [DB::table('wild_animals')
                        ->join('colors', 'colors.id', '=', 'wild_animals.color_id')
                        ->select('colors.*', 'wild_animals.*')
                        ->where('wild_animals.color_id', '=', $request->color_id)
                        ->orderBy('wild_animals.name', 'desc')
                        ->offset(($page - 1)*$this->perPage)
                        ->limit($this->perPage)
                        ->get(), 'color-desc'],
                    'animal-asc' => [DB::table('wild_animals')
                        ->join('colors', 'colors.id', '=', 'wild_animals.color_id')
                        ->select('colors.*', 'wild_animals.*')
                        ->orderBy('wild_animals.name', 'asc')
                        ->where('wild_animals.color_id', '=', $request->color_id)
                        ->offset(($page - 1)*$this->perPage)
                        ->limit($this->perPage)
                        ->get(), 'animal-asc'],
                    'animal-desc' => [DB::table('wild_animals')
                        ->join('colors', 'colors.id', '=', 'wild_animals.color_id')
                        ->select('colors.*', 'wild_animals.*')
                        ->orderBy('wild_animals.name', 'desc')
                        ->where('wild_animals.color_id', '=', $request->color_id)
                        ->offset(($page - 1)*$this->perPage)
                        ->limit($this->perPage)
                        ->get(), 'animal-desc'],
                    default => [DB::table('wild_animals')
                        ->join('colors', 'colors.id', '=', 'wild_animals.color_id')
                        ->select('colors.*', 'wild_animals.*')
                        ->where('wild_animals.color_id', '=', $request->color_id)
                        ->offset(($page - 1)*$this->perPage)
                        ->limit($this->perPage)
                        ->get(), 'default']
                };
                $filter = (int)$request->color_id;
            }
        }

        $parsedUrl = parse_url(url()->full());
        parse_str($parsedUrl['query'] ?? '', $prevQuery);

        return view('front.index', [
            'animals'=>$animalsDir[0],
            'sort'=>$animalsDir[1],
            'colors'=>Color::all(),
            'filter'=>$filter,
            's'=>$request->s ?? '',
            'allCount'=>$allCount ?? 0,
            'perPage'=>$this->perPage ?? 0,
            'prevQuery'=>$prevQuery,
            'pageSelected'=>$page ?? 0
        ]);
    }
}
