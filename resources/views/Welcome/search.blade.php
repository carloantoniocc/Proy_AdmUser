@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <ol class="breadcrumb">
              <li><a href="/">Listado de Funcionarios</a></li>
              <li class="active">Busqueda de Funcionarios</li>
            </ol>



            <div class="panel panel-default">
                <div class="panel-heading">Busqueda de Funcionarios</div>

                <div class="panel-body">
                    <form class="form-horizontal" role="search" method="GET" action="{{ URL::to('/Welcome') }}">
                        {{ csrf_field() }}



                        <!--Anexo-->  
                        <div class="form-group{{ $errors->has('anexo') ? ' has-error' : '' }}">
                            <label for="anexo" class="col-md-4 control-label">Anexo</label>

                            <div class="col-md-6">
                                <input id="anexo" type="text" class="form-control" pattern="[0-9]{1,6}"  name="anexo" value="{{ old('anexo') }}"  autofocus>

                                @if ($errors->has('anexo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('anexo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <!--Nombre-->    
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nombres</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" pattern="[A-Za-zÑñ_ ]{1,30}" minlength=3 name="name" value="{{ old('name') }}"  autofocus> 

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <!--Apellido Paterno-->    
                        <div class="form-group{{ $errors->has('ape_paterno') ? ' has-error' : '' }}">
                            <label for="ape_paterno" class="col-md-4 control-label">Apellido Paterno</label>

                            <div class="col-md-6">
                                <input id="ape_paterno" type="text" class="form-control" pattern="[A-Za-zÑñ_ ]{1,20}" minlength=3 name="ape_paterno" value="{{ old('ape_paterno') }}"  autofocus>

                                @if ($errors->has('ape_paterno'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ape_paterno') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <!--Apellido Materno-->    
                        <div class="form-group{{ $errors->has('ape_materno') ? ' has-error' : '' }}">
                            <label for="ape_materno" class="col-md-4 control-label">Apellido Materno</label>

                            <div class="col-md-6">
                                <input id="ape_materno" type="text" class="form-control" pattern="[A-Za-zÑñ_ ]{1,20}" minlength=1 name="ape_materno" value="{{ old('ape_materno') }}"  autofocus>

                                @if ($errors->has('ape_materno'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ape_materno') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>





                        <!--Departamento-->  
                        <div class="form-group{{ $errors->has('department_id') ? ' has-error' : '' }}">
                          <label for="department_id" class="col-md-4 control-label">Departamento</label>

                            <div class="col-md-6">
                                  <select id="department_id" class="form-control" name="department_id" >
                                        <option value="0">Seleccione Departamento</option>
                                    @foreach($departments as $department)
                                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                                    @endforeach        
                                  </select> 
                            </div>
                        </div>


                        <!--Establishment-->  
                        <div class="form-group{{ $errors->has('establishment_id') ? ' has-error' : '' }}">
                          <label for="establishment_id" class="col-md-4 control-label">Establecimiento</label>

                            <div class="col-md-6">
                                  <select id="establishment_id" class="form-control" name="establishment_id" >
                                        <option value="0">Seleccione Establecimiento</option>
                                    @foreach($establishments as $establishment)
                                        <option value="{{ $establishment->id }}">{{ $establishment->name }}</option>
                                    @endforeach        
                                  </select> 
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Buscar Funcionario
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
