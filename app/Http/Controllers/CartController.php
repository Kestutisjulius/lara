<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function add(Request $request)
    {
        $cart = new Cart;
        $cart->count = $request->animal_count;
        $cart->animal_id = $request->animal_id;
        $cart->user_id = Auth::user()->id;
        $cart->save();
        return redirect()->route('front_index')->with('success', 'cart added successfully');
    }

}
