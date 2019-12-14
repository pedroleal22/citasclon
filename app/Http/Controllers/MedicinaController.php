<?php

namespace App\Http\Controllers;

use App\Medicina;
use Illuminate\Http\Request;

class MedicinaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {

        $medicinas = Medicina::all();

        return view('medicinas/index',['medicinas'=>$medicinas]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('medicinas/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'composicion' => 'required|max:255',
            'presentacion' => 'required|max:255',
            'link' => 'required|max:255'
        ]);


        $medicina = new Medicina($request->all());
        $medicina->save();

        flash('Medicina creada correctamente');

        return redirect()->route('medicinas.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Medicina  $medicina
     * @return \Illuminate\Http\Response
     */
    public function show(Medicina $medicina)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Medicina  $medicina
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $medicina = Medicina::find($id);
        return view('medicinas/edit',['medicina'=> $medicina]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Medicina  $medicina
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'composicion' => 'required|max:255',
            'presentacion' => 'required|max:255',
            'link' => 'required|max:255'
        ]);

        $medicina=Medicina::find($id);
        $medicina-> fill($request->all());
        $medicina->save();

        flash('Medicina editada correctamente');

        return redirect()->route('medicinas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Medicina  $medicina
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $medicina = Medicina::find($id);
        $medicina->delete();
        flash('Medicina borrada correctamente');

        return redirect()->route('medicinas.index');
    }
}

