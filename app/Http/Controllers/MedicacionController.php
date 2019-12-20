<?php

namespace App\Http\Controllers;

use App\Medicacion;
use App\Medicina;
use App\Tratamiento;
use Illuminate\Http\Request;

class MedicacionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $medicacions = Medicacion::all()->where('tratamiento_id')->get();
        return view('medicacions/index',['medicacions'=>$medicacions]);
    }
    public function findByTratamiento($id)
    {
        $tratamiento = Tratamiento::find($id);
        $medicacions = Medicacion::all()->where('tratamiento_id',$id);
        return view('medicacions/index',['medicacions'=>$medicacions, 'tratamiento' => $tratamiento]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('medicacions/create');
    }

    public function createByTratamiento($id){
        $tratamiento = Tratamiento::find($id);
        $medicinas = Medicina::all()->pluck('name','id');
        return view('medicacions/create', ['tratamiento'=> $tratamiento, 'medicinas'=>$medicinas]);
    }

    public function storeToTratamiento(Request $request){
        $this->validate($request,[

            'tratamiento_id' => 'required|exists:tratamientos,id',
            'medicina_id' => 'required|exists:medicinas,id',
            'unidades' => 'required|max:255',
            'frecuencia' => 'required|max:255',
            'instrucciones' => 'required|max:255',

        ]);

        $medicacion = new Medicacion($request->all());
        $medicacion->save();

        flash('Medicacion creada correctamente');
        return redirect()-> route('medicacion.findByTratamiento',['id'=>$medicacion->tratamiento_id]);

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[

            'tratamiento_id' => 'required|exists:tratamientos,id',
            'medicina_id' => 'required|exists:medicinas,id',
            'unidades' => 'required|max:255',
            'frecuencia' => 'required|max:255',
            'instrucciones' => 'required|max:255',

        ]);

        $medicacion = new Medicacion($request->all());
        $medicacion->save();

        flash('Medicacion creada correctamente');
        return redirect()->route('medicacions.index', ["id" => $medicacion->tratamiento_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Medicacion  $medicacion
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Medicacion  $medicacion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $medicacion = Medicacion::find($id);
        $medicinas = Medicina::all()->pluck('name','id');

        return view('medicacions/edit',['medicacion'=> $medicacion, 'medicinas' => $medicinas ]);



    }




    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Medicacion  $medicacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request, [
            'tratamiento_id' => 'required|exists:tratamientos,id',
            'medicina_id' => 'required|exists:medicinas,id',
            'unidades' => 'required|max:255',
            'frecuencia' => 'required|max:255',
            'instrucciones' => 'required|max:255',

        ]);

        $medicacion = Medicacion::find($request->get('medicacion_id'));
        $medicacion->fill($request->all());

        $medicacion->save();

        flash('Medicacion modificada correctamente');

        return redirect()->route('medicacion.findByTratamiento',["id"=> $medicacion->tratamiento_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Medicacion  $medicacion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $medicacion = Medicacion::find($id);
        $medicacion->delete();
        flash('Medicacion borrada correctamente');

        return redirect()->route('medicacion.findByTratamiento',["id"=> $medicacion->tratamiento_id]);
    }
}
