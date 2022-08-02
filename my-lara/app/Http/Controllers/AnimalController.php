<?php

namespace App\Http\Controllers;

// require 'vendor/autoload.php';

use App\Models\Animal;
use App\Models\Color;
use Illuminate\Http\Request;
use Image;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dump($request->query());

        // $colors = Color::all()->sortByDesc('title');
        // $colors = Color::orderBy('title')->get();
        // $colors = Color::where('id', '>', 1)->orderBy('title')->get();
        // $colors = match ($request->sort) {
        //     'asc' => Color::orderBy('title')->get(), //default order by asc
        //     'desc' => Color::orderBy('title', 'desc')->get(),
        //     default => Color::all()
        // };

        $animals = Animal::all();

        return view('animal.index', ['animals' => $animals]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $colors = Color::all();
        return view('animal.create', ['colors' => $colors]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $animal = new Animal;

        if ($request->file('animal_photo')) {

            $photo = $request->file('animal_photo');

            $ext = $photo->getClientOriginalExtension();

            $name = pathinfo($photo->getClientOriginalName(), PATHINFO_FILENAME);

            $file = $name . '-' . rand(100000, 999999) . '.' . $ext;

            $Image = Image::make($photo)->pixelate(12);

            $Image->save(public_path() . '/images' . $file);

            // $photo->move(public_path() . '/images', $file);

            $animal->photo = asset('/images') . '/' . $file;
        }

        $animal->name = $request->animal_name;
        $animal->color_id = $request->color_id;

        $animal->save();
        return redirect()->route('colors-index')->with('success', 'Animal created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function show(int $animalId)
    {
        $animal = Animal::where('id', $animalId)->first();
        return view('animal.show', ['animal' => $animal]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function edit(Animal $animal)
    {

        $colors = Color::all();
        return view('animal.edit', ['animal' => $animal, 'colors' => $colors]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Animal $animal)
    {
        $name = pathinfo($animal->photo, PATHINFO_FILENAME);
        $ext = pathinfo($animal->photo, PATHINFO_EXTENSION);

        $path = asset('/images') . '/' . $name . '.' . $ext;

        if (file_exists($path)) {
            unlink($path);
        }

        if ($request->file('animal_photo')) {

            $photo = $request->file('animal_photo');

            $ext = $photo->getClientOriginalExtension();

            $name = pathinfo($photo->getClientOriginalName(), PATHINFO_FILENAME);

            $file = $name . '-' . rand(100000, 999999) . '.' . $ext;

            $photo->move(public_path() . '/images', $file);

            $animal->photo = asset('/images') . '/' . $file;
        }


        $animal->name = $request->animal_name;
        $animal->color_id = $request->color_id;
        $animal->save();
        return redirect()->route('animals-index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function destroy(Animal $animal)
    {
        if ($animal->photo) {
            $name = pathinfo($animal->photo, PATHINFO_FILENAME);
            $ext = pathinfo($animal->photo, PATHINFO_EXTENSION);

            $path = asset('/images') . '/' . $name . '.' . $ext;

            if (file_exists($path)) {
                unlink($path);
            }
        }

        $animal->delete();
        return redirect()->route('animals-index')->with('deleted', 'Successfully deleted');
    }


    public function deletePicture(Animal $animal)
    {
        $name = pathinfo($animal->photo, PATHINFO_FILENAME);
        $ext = pathinfo($animal->photo, PATHINFO_EXTENSION);

        $path = asset('/images') . '/' . $name . '.' . $ext;
        // dd($path);
        if (file_exists($path)) {
            unlink($path);
        }

        $animal->photo = null;
        $animal->save();
        return redirect()->back()->with('deleted', 'Animal have no photo now');
    }
}
