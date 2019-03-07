@extends('layouts.default')
@section('titulo_pagina','Especies | Edición de Especies')
@section('titulo','Especies')
@section('subtitulo','Ediciñón de Especies')
@section('contenido')
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <form action="{{route('especies.update',$especie->ID)}}" method="post" role="form">
                    @csrf
                    @method('PUT')
                    <label>Nombre</label>
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre de la especie"
                        value="{{$especie->Nombre}}" required>
                    <br />
                    <button type="submit" class="btn btn-default ">Actualizar especie </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection