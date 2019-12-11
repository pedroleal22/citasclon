<?php

namespace App\Http\Controllers;

use App\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{

    public function __construct() //ejecuta una lógica de negocio entre controlador: tipo de usuario
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations = Location::all();
        return view('locations/index',['locations'=>$locations]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('locations/create');

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
            'hospital' => 'required|max:255',
            'consulta' => 'required|max:255'
        ]);
        $location = new Location($request->all());
        $location->save();

        // return redirect('especialidades');

        flash('Localización creada correctamente');

        return redirect()->route('locations.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function show(Location $location)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $location = Location::find($id);
        return view('locations/edit', ['location' => $location]);

        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request $request
         * @param  \App\Location $location
         * @return \Illuminate\Http\Response
         */
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'hospital' => 'required|max:255',
            'consulta' => 'required|max:255'
        ]);
        $location = Location::find($id);
        $location->fill($request->all());
        $location->save();

        flash('Localización modificada correctamente');
        return redirect()->route('locations.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function destroy(Location $location)
    {
        //
    }
}
