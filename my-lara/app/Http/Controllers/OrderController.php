<?php

namespace App\Http\Controllers;

use App\Models\Animal;
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

        $order->order = json_encode(session()->get('cart', []));
        session()->put('cart', []);
        $order->user_id = Auth::user()->id;

        $order->save();
        return redirect()->route('my-orders');
    }

    public function showMyOrders()
    {
        $orders = Order::where('user_id', Auth::user()->id)
            ->orderBy('id', 'desc')
            ->get();

        $orders->map(function ($o) {
            $cart = json_decode($o->order, 1);
            $ids = array_map(fn ($p) => $p['id'], $cart);
            $cartCollection = collect([...$cart]);

            $o->animals = Animal::whereIn('id', $ids)->get()->map(function ($a) use ($cartCollection) {
                $a->count = $cartCollection->first(fn ($e) => $e['id'] === $a->id)['count'];
                return $a;
            });

            return $o;
        });


        // dd($orders);

        $orders = $orders->map(function ($o) {
            $time = Carbon::create($o->created_at);
            $o->time = $time->format('Y-m-d H:i:s');
            return $o;
        });


        return view('front.orders', ['orders' => $orders, 'statuses' => Order::STATUSES]);
    }

    public function index()
    {
        $orders = Order::orderBy('id', 'desc')
            ->get();

        $orders->map(function ($o) {
            $cart = json_decode($o->order, 1);
            $ids = array_map(fn ($p) => $p['id'], $cart);
            $cartCollection = collect([...$cart]);

            $o->animals = Animal::whereIn('id', $ids)->get()->map(function ($a) use ($cartCollection) {
                $a->count = $cartCollection->first(fn ($e) => $e['id'] === $a->id)['count'];
                return $a;
            });

            return $o;
        });

        // dd($orders);

        return view(
            'orders.index',
            [
                'orders' => $orders,
                'statuses' => Order::STATUSES
            ]
        );
    }

    public function setStatus(Request $request, Order $order)
    {
        $order->status = $request->status;
        $order->save();
        return redirect()->back();
    }
}
