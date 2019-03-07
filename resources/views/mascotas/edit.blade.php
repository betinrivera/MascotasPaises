@extends('layouts.default')
@section('titulo_pagina','Mascotas | Edición de mascotas')
@section('titulo','Mascotas')
@section('subtitulo','Ediciñón de mascotas')
@section('contenido')
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <form action="{{route('mascotas.update',$mascota->ID)}}" method="post" role="form">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Especie</label>
                        <select name="especie" class="form-control" required>
                            <option disabled value="">Elige una especie</option>
                            @foreach($especies as $especie)
                            <option value="{{$especie->ID}}" @if($especie->ID == $mascota->ID_especie) selected @endif
                                >{{$especie->Nombre}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Nombre</label>
                        <input class="form-control" type="text" name="nombre" placeholder="Nombre de la mascota"
                            value="{{$mascota->Nombre}}" required>
                    </div>
                    <div class="form-group">
                        <label>Precio</label>
                        <input class="form-control" type="text" name="precio" placeholder="Precio de la mascota"
                            value="{{$mascota->Precio}}" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Fecha de nacimiento</label>
                        <input class="form-control" type="date" name="nacimiento" value="{{$mascota->Nacimiento}}"
                            required>
                    </div>

                    <div class="form-group">
                        <label class="control.label">Pais</label>
                        <select class="form-control" name="pais" required>
                                <option selected disabled value="" >Elige un país</option>
                                @foreach($paises as $pais)
                                    <option value="{{$pais->id}}"></option>
                                @endforeach
                        </select>

                    </div>

                    <div class="form-group">
                        <label class="control.label">Estado</label>
                        <select class="form-control" name="Estado" required>
                                <option selected disabled value="" >Elige un estado</option>
                        </select>

                    </div>


                    <button type="submit" class="btn btn-default ">Actualizar mascota </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection