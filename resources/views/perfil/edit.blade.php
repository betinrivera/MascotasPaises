@extends('layouts.default')
@section('titulo_pagina','Mascotas | Perfil de Usuario')
@section('titulo','Mascotas')
@section('subtitulo','Perfil de Usuario')
@section('contenido')
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Perfil de Usuario</h3>
            </div>
            <div class="box-body">
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
                <form method="POST" action="{{ route('perfil.update', $usuario->id) }}" enctype="multipart/form-data"
                    id="frmActualizarPerfil">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Nombre</label>
                        <input name="nombre" class="form-control" value="{{ $usuario->name }}" type="text">
                    </div>
                    <div class="form-group">
                        <label>Correo</label>
                        <input class="form-control" type="email" value="{{ $usuario->email }}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Foto</label>
                        <input name="foto" class="form-control" type="file">
                    </div>
                    <div class="form-group">
                        @if($usuario->foto)
                        <img src="/storage/{{ $usuario->foto }}" style="width: 400px; height: auto;"
                            class="img-responsive">
                        @endif
                    </div>
                    <div class="form-group grupo-password">
                        <label>Contraseña</label>
                        <input name="password" class="form-control input-password" type="password"
                            id="txtPasswordInput">

                    </div>
                    <div class="form-group grupo-password">
                        <label class="control-label">Confirmar Contraseña</label>
                        <input class="form-control input-password" type="password" id="txtPasswordConfirm">
                        <span class="help-block" id="passwordError"><i class="fa fa-times-circle-o"></i> Las contraseñas
                            no coinciden</span>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-primary" id="btnActualizar">Guardar Cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection

@section('scripts')
<script>
    function doClickActualizar(event) {
        if ($("#txtPasswordInput").val() == $("#txtPasswordConfirm").val()) {
            //Envío el formulario
            $("#frmActualizarPerfil").submit();
        } else {
            //Muestro errores
            $("#passwordError").show();
            $(".grupo-password").addClass("has-error");
        }
    }

    //Real time Detection
    $(".input-password").blur(function () {
        if ($("#txtPasswordInput").val() == $("#txtPasswordConfirm").val()) {
            $("#passwordError").hide();
            $(".grupo-password").removeClass("has-error");
        }
        else {
            $("#passwordError").show();
            $(".grupo-password").addClass("has-error");
        }
    });

    //Hide error message during editing
    $(".input-password").focus(function () {
        $("#passwordError").hide();
        $(".grupo-password").removeClass("has-error");
    });

    $(function () {
        $("#passwordError").hide();
        $("#btnActualizar").click(doClickActualizar);
    });
</script>
@endsection