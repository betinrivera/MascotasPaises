<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mascota;
use App\Especie;

class EspecieController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $especies = Especie::all();

        $argumentos = array();
        $argumentos['especies'] = $especies;
        return view('especies.index',$argumentos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $especies = Especie::all();

        $argumentos = array();
        $argumentos['especies'] = $especies;
        return view('especies.create', $argumentos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Creando instancia
        $nuevaEspecie = new Especie();
        $nuevaEspecie->Nombre = $request->input('nombre');
        
        $nuevaEspecie->save();
        return redirect()->route('especies.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $especie = Especie::find($id);

        $argumentos = array();

        $argumentos['especie'] = $especie;
        return view('especies.edit',$argumentos);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $especie = Especie::find($id);
        $especie->Nombre = $request->input('nombre');

        //Guardar cambios
        $especie->save();
        return redirect()->route('especies.edit',$id);
    }
 

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $especie = Especie::find($id);
        $especie->delete();
        return redirect()->route('especies.index');

    }
}
