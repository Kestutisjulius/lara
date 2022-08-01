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

        switch (1){
            case 1:
                foreach ($cart as &$item){
                if ($item['id'] == $id){
                    $item['count'] += $count;
                    break 2;
                }
            }
            default : $cart[]=['id'=> $id, 'count'=> $count];
        }



        session()->put('cart', $cart);
        return response()->json([
            'msg'=>'ok'
        ]);
    }
    public function show(){

        $cart = session()->get('cart', []);
        $id= array_map(fn($product)=>$product['id'], $cart);
        $cartCollection = collect([...$cart]);

        $animals= Animal::whereIn('id', $id)->get()->map(function($animal) use ($cartCollection){
            $animal->count = $cartCollection->first(fn($elementas)=>$elementas['id'] == $animal->id)['count'];
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
