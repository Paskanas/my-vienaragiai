<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalsController extends Controller
{
    public function vienaragis(Request $request)
    {
        dump($request);
        dump($request->kiekis);
        return 'Valio vienaragiau';
    }

    public function briedis(Request $request, $ids = 0, $datas = 'nera')
    {
        // dump($request);
        dump($ids);
        dump($datas);
        return 'Valio briedžiams';
    }
}
