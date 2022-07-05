<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SumaController extends Controller
{
    public function suma(Request $request, $num2 = 0, $num1 = 0)
    {
        dump($num1 + $num2);

        $return =  $num1 + $num2;

        return view('suma', ['result' => $return]);
    }

    public function skirtumas(Request $request)
    {
        $result = $request->session()->get('result', '');
        return view('post.form', ['result' => $result]);
    }

    public function skaiciuoti(Request $request)
    {
        $result = $request->x - $request->y;
        dump($result);
        // $request->session()->flash('result', $result);
        return redirect()->route('forma')->with('result', $result);
    }
}
