@extends('layouts.default')
@section('titulo_pagina','Especies | Agregar Especie')
@section('titulo','Especies')
@section('subtitulo','Agregar Especie')
@section('contenido')
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <form action="{{route('especies.store')}}" method="post">
                    @csrf
                    <label>Nombre</label>
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre de la especie" required>
                    <br />
                    <button type="submit" class="btn btn-default">Crear nueva especie</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection