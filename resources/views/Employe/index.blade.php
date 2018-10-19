@extends('layouts.app')

@section('content')
<div class="container-fluid">
	<!--Mensajes de Guardado o Actualización de Establecimientos-->
	<?php $message=Session::get('message') ?>
	@if($message == 'store')
		<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			Usuario Creado Exitosamente
		</div>
	@elseif($message == 'update')
		<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			Usuario Actualizado Exitosamente
		</div>
	@endif
	<!--FIN Mensajes de Guardado o Actualización de Establecimientos-->
    <div class="row">
        <div class="col-md-12 col-md-offset-0">


            <ol class="breadcrumb">
              <li><a href="/home">Home</a></li>
              <li class="active">Listado de Funcionarios </li>
            </ol>

            <div class="panel panel-default">
                <div class="panel-heading">Listado de Funcionarios</div>
                <div class="panel-body">
                    {{ csrf_field() }} 
					<div class="row">
						<!-- Boton Crear Nueva Establecimiento -->
						<div class="col-md-6">
							<a class="btn btn-sm btn-primary" href="{{ URL::to('Employe/create') }}">Crear Usuario</a>
						</div>


                        <p>
                            <a class="btn btn-sm btn-primary" href="{{ URL::to('buscarfuncionario/') }}">Buscar Funcionario</a>
                        </p>						
						
					</div>
					</br>
					<!-- Lista de Establecimientos -->		
					<div class="row">
						<div class="col-md-12">
							<table class="table table-striped">
								<thead>
								  <tr>
									
									<th>Nombre</th>
									<th>Apellido Paterno</th>
									<th>Apellido Materno</th>
									<th>Correo Electronico</th>
									<th>Anexo</th>
									<th>Departamento</th>
									<th>Piso</th>
									<th>Estado</th>
									<th>Establecimiento</th>
									<th>Editar</th>


								  </tr>
								</thead>
								<tbody>
								  @foreach($employes as $employe)

								  <tr>
									
									<td>{{ $employe->name }}</td>
									<td>{{ $employe->ape_paterno }}</td>
									<td>{{ $employe->ape_materno }}</td>
									<td>{{ $employe->email }}</td>
									<td>{{ $employe->anexo }}</td>
									<td>{{ $employe->departamento }}</td>
									<td>{{ $employe->piso }}</td>

									<td>
										@if( $employe->active == 1 )
											Activo
										@else
											Inactivo
										@endif
									</td>
									<td>{{ $employe->establecimiento }}</td>									

									<td><a href="{{ URL::to('Employe/' . $employe->id . '/edit') }}">Editar</a></td>
								  </tr>
								  @endforeach
								</tbody>
							</table>
                            <div class="text-right">    
                                Total de registros : {{  $employes->total() }}
                            </div>    
                            <div class="text-center">

							<!--paginacion-->
							{{ $employes->appends(request()->input())->links() }}
								
						</div>
					</div>
					<!-- FIN Lista de Establecimientos -->			
                </div>
            </div>
        </div>
    </div>
</div>
@endsection