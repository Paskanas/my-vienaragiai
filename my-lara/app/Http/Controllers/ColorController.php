<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;
// use App\Http\Requests\StoreColorRequest;
// use App\Http\Requests\UpdateColorRequest;

class ColorController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        dump($request->query());

        // $colors = Color::all()->sortByDesc('title');
        // $colors = Color::orderBy('title')->get();
        // $colors = Color::where('id', '>', 1)->orderBy('title')->get();
        $colors = match ($request->sort) {
            'asc' => Color::orderBy('title')->get(), //default order by asc
            'desc' => Color::orderBy('title', 'desc')->get(),
            default => Color::all()
        };

        return view('color.index', ['colors' => $colors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('color.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $color = new Color;
        $color->color = $request->create_color_input;
        $color->title = $request->color_title ?? 'no title';
        $color->save();
        return redirect()->route('colors-index')->with('success', 'Color created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function show(int $colorId)
    {
        $color = Color::where('id', $colorId)->first();
        return view('color.show', ['color' => $color]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function edit(Color $color)
    {
        return view('color.edit', ['color' => $color]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Color $color)
    {
        $color->color = $request->create_color_input;
        $color->title = $request->color_title ?? 'no title';
        $color->save();
        return redirect()->route('colors-index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function destroy(Color $color)
    {
        if (!$color->animals->count()) {
            $color->delete();

            return redirect()->route('colors-index')->with('deleted', 'Successfully deleted');
        }
        return redirect()->back()->with('deleted', 'First delete all animals with this color');
    }
}
