<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Color;

class SumaController extends Controller
{
    public function suma(Request $request, $num2 = 0, $num1 = 0)
    {

        $return =  $num1 + $num2;

        return view('suma', ['result' => $return]);
    }

    public function skirtumas(Request $request)
    {
        $color = Color::all();

        $result = $request->session()->get('result', '');
        return view('post.form', ['result' => $result, 'colors' => $color]);
    }

    public function skaiciuoti(Request $request)
    {
        $result = $request->x - $request->y;
        /* intelephense-disable */
        // $request->session()->flash('result', $result);
        /* intelephense-enable */
        $color = new Color;
        $color->color = $result;
        $color->save();
        return redirect()->route('forma')->with('result', $result);
    }
}
