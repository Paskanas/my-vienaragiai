<?php

namespace App\Http\Controllers;

use App\Models\Master;
// use App\Http\Requests\StoreMasterRequest;
// use App\Http\Requests\UpdateMasterRequest;
use App\Models\Skill;
use Illuminate\Http\Request;

class MasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $masters = Master::orderBy('master_name')->get();

        $masters = $masters->sort(fn ($a, $b) => $b->skills()->count() <=> $a->skills()->count());


        return view('master.index', ['masters' => $masters]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMasterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Master  $master
     * @return \Illuminate\Http\Response
     */
    public function show(Master $master)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Master  $master
     * @return \Illuminate\Http\Response
     */
    public function edit(Master $master)
    {
        $skills = Skill::all();
        $has =  $master->skills->pluck('id')->toArray();


        $skills = $skills->map(function ($s) use ($has) {
            $s->checked = in_array($s->id, $has);
            return $s;
        });

        return view('master.edit', [
            'master' => $master,
            'skills' => $skills,
            'has' => $has
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMasterRequest  $request
     * @param  \App\Models\Master  $master
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Master $master)
    {
        $master->skills()->detach();

        $master->skills()->attach($request->skill);

        // return redirect()->back();
        return redirect()->route('masters-index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Master  $master
     * @return \Illuminate\Http\Response
     */
    public function destroy(Master $master)
    {
        $master->delete();
        return redirect()->route('masters-index');
    }
}
