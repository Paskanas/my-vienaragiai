<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Request $request)
    {

        dump($request->all());

        $count = (int) $request->animalCount;
        $id = (int) $request->animalId;

        $cart = session()->get('cart', []);

        switch (1) {
            case 1:
                foreach ($cart as &$item) {
                    if ($item['id'] == $id) {
                        $item['count'] += $count;
                        break 2;
                    }
                }

            default:
                $cart[] = ['id' => $id, 'count' => $count];
        }

        dump($cart);

        session()->put('cart', $cart);

        return response()->json(([
            'msg' => 'Tu nuostabi arba pastabus'
        ]));
    }

    public function showSmallCart()
    {
        // $co = session()->get('co', collect());

        $cart = session()->get('cart', []);

        $ids = array_map(fn ($p) => $p['id'], $cart);

        $cartCollection = collect([...$cart]);

        $animals = Animal::whereIn('id', $ids)->get()->map(function ($a) use ($cartCollection) {
            $a->count = $cartCollection->first(fn ($e) => $e['id'] === $a->id)['count'];
            return $a;
        });

        $all = count($cart);


        $html = view('front.cart')->with(['count' => $all, 'cart' => $animals])->render();

        return response()->json(([
            'html' => $html,
            // 'all' => $all
        ]));
    }

    public function deleteSmallCart(Request $request)
    {

        $cart = session()->get('cart', []);
        $id = (int) $request->id;
        foreach ($cart as $key => $item) {
            if ($id == $item['id']) {
                unset($cart[$key]);
                break;
            }
        }

        session()->put('cart', $cart);



        return response()->json(([
            'msg' => 'Stupid answer'
        ]));
    }
}
