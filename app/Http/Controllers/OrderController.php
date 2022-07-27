<?php

namespace App\Http\Controllers;


use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    public function add(Request $request)
    {
        $order = new Order;
        $order->count = $request->animal_count;
        $order->animal_id = $request->animal_id;
        $order->user_id = Auth::user()->id;
        $order->save();
        return redirect()->route('my_orders')->with('success', 'ANIMAL to ORDER added successfully');
    }

    public function showMyOrders()
    {
        $orders = Order::where('user_id', Auth::user()->id)->get();


        return view('front.orders', ['orders'=>$orders]);
    }

}
