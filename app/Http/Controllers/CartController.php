<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WildAnimal AS Animal;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $count = (int) $request->animalCount;
        $id = (int) $request->animalId;

        $cart = session()->get('cart', []);
        $cart[]=['id'=> $id, 'count'=> $count];
        session()->put('cart', $cart);
        return response()->json([
            'msg'=>'ok'
        ]);
    }
    public function show(){

        $cart = session()->get('cart', []);
        $id= array_map(fn($product)=>$product['id'], $cart);
        $cartCollection = collect([...$cart]);

        $animals= Animal::whereIn('id', $id)->get()->map(function($animal){
            $animal->count = 2;
            return $animal;
        });

        $all = count($cart);

        $html = view('front.cart')->with([
            'count' => $all,
            'cart' => $animals
        ])->render();

        return response()->json([
            'html'=>$html
        ]);
    }
    public function clearCard(){
        session()->put('cart', []);
        return response()->json([
            'msg'=>'cart is cleared'
        ]);
    }
}
