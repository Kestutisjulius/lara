<?php

namespace App\Http\Controllers;


use App\Models\Order;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::orderBy('id', 'desc')->get();
        return view('order.index', ['orders'=>$orders]);
    }

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
        $orders = Order::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        $orders = $orders->map(function ($order){
            $time = Carbon::create($order->created_at)->timezone('Europe/Vilnius');
        $order->time = $time->format('Y-M-d (H:i:s)');
        return $order;
        });

//        dd($orders);
        return view('front.orders', ['orders'=>$orders]);
    }

}
