@extends('layouts.default')
@section('titulo_pagina','Mascotas | Lista de mascotas')
@section('titulo','Mascotas')
@section('subtitulo','Lista de mascotas')
@section('contenido')
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Table de lista de mascota</h3>
                <div>
                    <a href="{{route('mascotas.create')}}">
                        <button class="btn btn-primary">Agregar mascota</button>
                    </a>
                    @if(Session::has('exito'))
                    <div class="alert alert-success alert-dismissible" style="margin-top:20px;">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-check"></i> Éxito!</h4>
                        {{ Session::get('exito') }}
                    </div>
                    @endif

                    @if(Session::has('error'))
                    <div class="alert alert-danger alert-dismissible" style="margin-top:20px;">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-ban"></i> Error!</h4>
                        {{ Session::get('error') }}
                    </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table" id="tablaMascotas">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Precio</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($mascotas as $mascota)
                                <tr>
                                    <td>{{ $mascota->Nombre }}</td>
                                    <td>$ {{ $mascota->Precio }}.00</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{route('mascotas.edit',$mascota->ID)}}">
                                            <i class="fa fa-fw fa-edit"></i>Editar
                                        </a>
                                        <button type="button" class="btn btn-danger" data-toggle="modal"
                                            data-target="#modalBorrar{{$mascota->ID}}">
                                            <i class="fa fa-fw fa-trash"></i>Borrar
                                        </button>
                                        <div class="modal fade" id="modalBorrar{{$mascota->ID}}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">×</span></button>
                                                        <h4 class="modal-title">Eliminar mascota</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Estas seguro que deseas eliminar a {{$mascota->Nombre}}?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default pull-left"
                                                            data-dismiss="modal">Cancelar</button>
                                                        <form method="POST"
                                                            action="{{route('mascotas.destroy',$mascota->ID)}}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="btn btn-danger">Eliminar</button>
                                                        </form>
                                                    </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @endsection

        @section('scripts')
        <!-- DataTables -->
        <script src="../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

        <script>
            $(function () {
                ('#tablaMascotas').DataTable();
            });
        </script>
        @endsection