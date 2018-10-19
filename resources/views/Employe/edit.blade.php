@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <!--BreadCrumb-->
			<ol class="breadcrumb">
			  <li><a href="/Employe">Lista de Funcionarios</a></li>
			  <li class="active">Editar Funcionario</li>
			</ol>
			<!--FIN BreadCrumb-->
			<!--Panel Formulario Editar Establecimiento-->
			<div class="panel panel-default">
                <div class="panel-heading">Editar Funcionario</div>
                <div class="panel-body">
					<form class="form-horizontal" role="form" method="POST" action="/Employe/{{$employes->id}}">
                        <input type="hidden" name="_method" value="PUT">
                        {{ csrf_field() }}


                        <!--Nombre-->    
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nombres</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{$employes->name}}" pattern="[A-Za-zÑñ_ ]{1,30}" minlength=3 required autofocus>

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
                                <input id="ape_paterno" type="text" class="form-control" name="ape_paterno" pattern="[A-Za-zÑñ_ ]{1,20}" minlength=3 value="{{$employes->ape_paterno}}" required autofocus>

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
                                <input id="ape_materno" type="text" class="form-control" name="ape_materno" pattern="[A-Za-zÑñ_ ]{1,20}" minlength=1 value="{{$employes->ape_materno}}" autofocus>

                                @if ($errors->has('ape_materno'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ape_materno') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!--Email-->  
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Correo Electronico</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="email" value="{{$employes->email}}"  pattern="[A-Za-zÑñ_.@]{1,50}" minlength=19 autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <!--Anexo-->  
                        <div class="form-group{{ $errors->has('anexo') ? ' has-error' : '' }}">
                            <label for="anexo" class="col-md-4 control-label">Anexo</label>

                            <div class="col-md-6">
                                <input id="anexo" type="text" class="form-control" name="anexo" pattern="[0-9]{1,6}" minlength=6 value="{{$employes->anexo}}"  autofocus>

                                @if ($errors->has('anexo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('anexo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <!--Piso-->  
                        <div class="form-group{{ $errors->has('piso') ? ' has-error' : '' }}">
                            <label for="piso" class="col-md-4 control-label">Piso</label>

                            <div class="col-md-6">
                                <input id="piso" type="text" class="form-control" name="piso" pattern="[0-9]{1,1}" minlength=1 value="{{$employes->piso}}"  autofocus>

                                @if ($errors->has('piso'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('piso') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <!--Departamento-->  
                        <div class="form-group{{ $errors->has('department_id') ? ' has-error' : '' }}">
                          <label for="department_id" class="col-md-4 control-label">Departamento</label>

                            <div class="col-md-6">
                                  <select id="department_id" class="form-control" name="department_id" required>
                                    @foreach($departments as $department)
                                        @if($department->id == $employes->department_id)
                                            <option value="{{ $department->id }}" selected="">{{ $department->name }}</option>
                                        @else
                                            <option value="{{ $department->id }}">{{ $department->name }}</option>   
                                        @endif    
                                    @endforeach        
                                  </select> 
                            </div>
                        </div>


                        <!--Establishment-->  
                        <div class="form-group{{ $errors->has('establishment_id') ? ' has-error' : '' }}">
                          <label for="establishment_id" class="col-md-4 control-label">Establecimiento</label>

                            <div class="col-md-6">
                                  <select id="establishment_id" class="form-control" name="establishment_id" required>
                                    @foreach($establishments as $establishment)
                                        @if($establishment->id == $employes->establishment_id)
                                            <option value="{{ $establishment->id }}" selected="">{{ $establishment->name }}</option>
                                        @else
                                            <option value="{{ $establishment->id }}">{{ $establishment->name }}</option>
                                        @endif    
                                    @endforeach        
                                  </select> 
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('categorie_id') ? ' has-error' : '' }}">
                          <label for="categorie_id" class="col-md-4 control-label">Categoria</label>

                            <div class="col-md-6">
                                  <select id="categorie_id" class="form-control" name="categorie_id" required>
                                    @foreach($categories as $categorie)
                                        @if($categorie->id == $employes->categorie_id)
                                            <option value="{{ $categorie->id }}" selected="">{{ $categorie->name }}</option>
                                        @else
                                            <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                                        @endif    
                                    @endforeach        
                                  </select> 
                            </div>
                        </div>

                        <!--PhoneModel-->  
                        <div class="form-group{{ $errors->has('phonemodel_id') ? ' has-error' : '' }}">
                          <label for="phonemodel_id" class="col-md-4 control-label">Modelo de Telefono</label>

                            <div class="col-md-6">
                                  <select id="phonemodel_id" class="form-control" name="phonemodel_id" required>
                                    @foreach($phonemodels as $phonemodel)
                                        @if($phonemodel->id == $employes->phonemodel_id)
                                            <option value="{{ $phonemodel->id }}" selected="">{{ $phonemodel->name }}</option>
                                        @else
                                            <option value="{{ $phonemodel->id }}">{{ $phonemodel->name }}</option>
                                        @endif    
                                    @endforeach        
                                  </select> 
                            </div>
                        </div>

						<!--Lista Activo-->
						<div class="form-group{{ $errors->has('active') ? ' has-error' : '' }}">
                            <label for="active" class="col-md-4 control-label">Activo</label>

                            <div class="col-md-6">
								<select id="active" class="form-control" name="active" required>

                                @if ($employes->active == 1)
                                    <option value="1" selected>Si</option>
                                    <option value="0">No</option>
                                @else
                                    <option value="1">Si</option>
                                    <option value="0" selected>No</option>      
                                @endif


								</select>
                            </div>

                                
                        </div>
						<!--Boton Submit-->
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Editar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
			<!--FIN Panel Formulario Crear Establecimientos-->
        </div>
    </div>
</div>


@endsection

