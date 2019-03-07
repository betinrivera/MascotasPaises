<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mascota;
use App\Especie;
use App\Pais;
use App\Estado;

class MascotaController extends Controller
{
    public function __construct()
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
        $mascotas = Mascota::all();

        $argumentos = array();
        $argumentos['mascotas'] = $mascotas;
        return view('mascotas.index',$argumentos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $especies = Especie::all();
        $paises = Pais::all();

        $argumentos = array();
        $argumentos['especies'] = $especies;
        $argumentos['paises'] = $paises;
        
        return view('mascotas.create', $argumentos);
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
        $nuevaMascota = new Mascota();
        $nuevaMascota->ID_especie = $request->input('especie');
        $nuevaMascota->Nombre = $request->input('nombre');
        $nuevaMascota->Precio = $request->input('precio');
        $nuevaMascota->Nacimiento = $request->input('nacimiento');
        
        if ($nuevaMascota->save()) {
            return redirect()->route('mascotas.index')->with('exito', 'Mascota eliminada');
        }
        return redirect()->route('mascotas.index')->with('error', 'No se pudo eliminar mascota');  
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
        $especies = Especie::all();
        $mascota = Mascota::find($id);

        $argumentos = array();
        $argumentos['especies'] = $especies;
        $argumentos['mascota'] = $mascota;
        return view('mascotas.edit',$argumentos);
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
        $mascota = Mascota::find($id);
        $mascota->ID_especie = $request->input('especie');
        $mascota->Nombre = $request->input('nombre');
        $mascota->Precio = $request->input('precio');
        $mascota->Nacimiento = $request->input('nacimiento');

        //Guardar cambios
        if ($mascota->save()) {
            return redirect()->route('mascotas.index',$id)->with('exito', 'Mascota eliminada');
        }
        return redirect()->route('mascotas.index',$id)->with('error', 'No se pudo eliminar mascota');     
        
    }
 

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mascota = Mascota::find($id);
        if ($mascota->delete()) {
            return redirect()->route('mascotas.index')->with('exito', 'Mascota eliminada');
        }
        return redirect()->route('mascotas.index')->with('error', 'No se pudo eliminar mascota');
    }
}
