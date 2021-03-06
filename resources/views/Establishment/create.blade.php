@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">


            <ol class="breadcrumb">
              <li><a href="/Establishment">Lista de Establecimientos</a></li>
              <li class="active">Crear Establecimiento</li>
            </ol>


            <div class="panel panel-default">
                <div class="panel-heading">Crear Establecimiento</div>

                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="/Establishment">
                        {{ csrf_field() }}
                        <!--Campo Codigo-->
                        <div class="form-group{{ $errors->has('code') ? ' has-error' : '' }}">
                            <label for="codigo" class="col-md-4 control-label">Código</label>

                            <div class="col-md-6">
                                <input id="code" type="text" class="form-control" name="code" value="{{ old('code') }}" required autofocus>

                                @if ($errors->has('code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!--Campo Nombre-->
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nombre</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!--Lista Tipo-->
                        <div class="form-group{{ $errors->has('tipo') ? ' has-error' : '' }}">
                            <label for="tipo" class="col-md-4 control-label">Tipo</label>

                            <div class="col-md-6">
                                <select id="tipo" class="form-control" name="tipo" required>
                                  <option value="">Seleccione Tipo</option>
                                  @foreach($tipos as $tipo)
                                    <option value="{{ $tipo->id }}">{{ $tipo->name }}</option>
                                  @endforeach
                                </select>
                            </div>
                        </div>
                        <!--Lista Comuna-->
                        <div class="form-group{{ $errors->has('comuna') ? ' has-error' : '' }}">
                            <label for="comuna" class="col-md-4 control-label">Comuna</label>

                            <div class="col-md-6">
                                <select id="comuna" class="form-control" name="comuna" required>
                                  <option value="">Seleccione Comuna</option>
                                  @foreach($comunas as $comuna)
                                    <option value="{{ $comuna->id }}">{{ $comuna->name }}</option>
                                  @endforeach
                                </select>
                            </div>
                        </div>
                        <!--Campo Direccion-->
                        <div class="form-group{{ $errors->has('direccion') ? ' has-error' : '' }}">
                            <label for="direccion" class="col-md-4 control-label">Dirección</label>

                            <div class="col-md-6">
                                <input id="direccion" type="text" class="form-control" name="direccion" value="{{ old('direccion') }}" onFocus="geolocate()" required autofocus>

                                @if ($errors->has('direccion'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('direccion') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!--Elementos ocultos-->
                        <input name="x" id="x" type="hidden" value="{{ old('x') }}">
                        <input name="y" id="y" type="hidden" value="{{ old('y') }}">
                        <!--Lista Activo-->
                        <div class="form-group{{ $errors->has('active') ? ' has-error' : '' }}">
                            <label for="active" class="col-md-4 control-label">Activo</label>

                            <div class="col-md-6">
                                <select id="active" class="form-control" name="active" required>
                                  <option value="1">Si</option>
                                  <option value="0">No</option>
                                </select>
                            </div>
                        </div>
                        <!--Boton Submit-->
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Guardar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
