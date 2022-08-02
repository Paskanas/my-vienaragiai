<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class OrderController extends Controller
{
    public function add(Request $request)
    {
        // dd($request->all());

        $order = new Order;

        $order->count = $request->animals_count;
        $order->animal_id = $request->animals_id;
        $order->user_id = Auth::user()->id;

        $order->save();
        return redirect()->route('my-orders');
    }

    public function showMyOrders()
    {
        $orders = Order::where('user_id', Auth::user()->id)
            ->orderBy('id', 'desc')
            ->get();

        $orders = $orders->map(function ($o) {
            $time = Carbon::create($o->created_at);
            // dd($time);
            $o->time = $time->format('Y-m-d H:i:s');
            return $o;
        });


        return view('front.orders', ['orders' => $orders, 'statuses' => Order::STATUSES]);
    }

    public function index()
    {
        $orders = Order::orderBy('id', 'desc')
            ->get();
        return view('orders.index', ['orders' => $orders, 'statuses' => Order::STATUSES]);
    }

    public function setStatus(Request $request, Order $order)
    {
        $order->status = $request->status;
        $order->save();
        return redirect()->back();
    }
}
