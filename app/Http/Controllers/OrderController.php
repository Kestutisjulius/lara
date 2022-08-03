<?php

namespace App\Http\Controllers;


use App\Models\Order;
use App\Models\WildAnimal as Animal;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    /**
     * @var int[]
     */
    private static array $status= ['admin'=>1, 'confirmed'=>2, 'rejected'=>3, 'attention needed'=>4];

    public function index(Request $request)
    {
        $orders = Order::orderBy('id', 'desc')->get();
        $orders->map(function($order){
            $cart = json_decode($order->order, 1);
            $id= array_map(fn($product)=>$product['id'], $cart);
            $cartCollection = collect([...$cart]);
            $order->animals = Animal::whereIn('id', $id)->get()->map(function($animal) use ($cartCollection){
                $animal->count = $cartCollection->first(fn($elementas)=>$elementas['id'] == $animal->id)['count'];
                return $animal;
            });
            return $order;
        });
        $orders = $orders->map(function ($order){
            $time = Carbon::create($order->created_at)->timezone('Europe/Vilnius');
            $order->time = $time->format('Y-M-d (H:i:s)');
            return $order;
        });



        return view('order.index', ['orders'=>$orders, 'status'=>OrderController::$status]);
    }

    public function add(Request $request)
    {
        $order = new Order;

        $order->order=json_encode($request->session()->get('cart', []));
        session()->put('cart', []);
        $order->user_id = Auth::user()->id;
        $order->save();
        return redirect()->route('my_orders');
    }

    public function showMyOrders()
    {

        $orders = Order::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        $orders->map(function($order){
            $cart = json_decode($order->order, 1);
            $id= array_map(fn($product)=>$product['id'], $cart);
            $cartCollection = collect([...$cart]);
            $order->animals = Animal::whereIn('id', $id)->get()->map(function($animal) use ($cartCollection){
                $animal->count = $cartCollection->first(fn($elementas)=>$elementas['id'] == $animal->id)['count'];
                return $animal;
            });
            return $order;
        });
        $orders = $orders->map(function ($order){
            $time = Carbon::create($order->created_at)->timezone('Europe/Vilnius');
        $order->time = $time->format('Y-M-d (H:i:s)');
        return $order;
        });
        return view('front.orders', ['orders'=>$orders, 'status'=>OrderController::$status]);
    }

    public function update(Request $request, Order $order){
        $order->status = $request->status;
        $order->save();
        return redirect()->back()->with('success', 'updated');
    }

}
