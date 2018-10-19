@extends('layouts.app')

@section('content')
<div class="container-fluid">
	<!--Mensajes de Guardado o Actualización de Establecimientos-->
	<?php $message=Session::get('message') ?>
	@if($message == 'store')
		<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			Departamento Creado Exitosamente
		</div>
	@elseif($message == 'update')
		<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			Departamento Modificado Exitosamente
		</div>
	@endif
	<!--FIN Mensajes de Guardado o Actualización de Establecimientos-->
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <ol class="breadcrumb">
              <li><a href="/home">Home</a></li>
              <li class="active">Lista de Departamentos</li>
            </ol>

            <div class="panel panel-default">
                <div class="panel-heading">Lista de Departamentos</div>
                <div class="panel-body">
                    {{ csrf_field() }} 
					<div class="row">
						<!-- Boton Crear Nueva Establecimiento -->
						<div class="col-md-6">
							<a class="btn btn-sm btn-primary" href="{{ URL::to('Department/create') }}">Crear Departamento</a>
						</div>
						<form class="navbar-form navbar-left" role="search" method="GET" action="/Department/">
					 		<div class="form-group">
	    						<input type="text" name="name"  value="{{ old('name') }}" class="form-control" placeholder="Buscar departamento" pattern="[A-Za-zÑñ_-.]{1,100}" >
	  						</div>
	  						<button type="submit" class="btn btn-sm btn-primary">Buscar</button>
						</form>	
					
						
					</div>
					</br>
					<!-- Lista de Establecimientos -->		
					<div class="row">
						<div class="col-md-12">
							<table class="table table-striped">
								<thead>
								  <tr>
									<th>id</th>
									<th>Nombre</th>
									<th>Estado</th>
									<th>Editar</th>
								  </tr>
								</thead>
								<tbody>
								  @foreach($departments as $department)

								  <tr>
									<td>{{ $department->id }}</td>
									<td>{{ $department->name }}</td>

									<td>
										@if( $department->active == 1 )
											Activo
										@else
											Inactivo
										@endif
									</td>
									
									<td><a href="{{ URL::to('Department/' . $department->id . '/edit') }}">Editar</a></td>
								  </tr>
								  @endforeach
								</tbody>
							</table>
							<!--paginacion-->

                            <div class="text-right">    
                                Total de registros : {{  $departments->total() }}
                            </div>
                            <div class="text-center">
                                 
                               {{ $departments->appends(request()->input())->links() }}
                            </div>



						</div>
					</div>
					<!-- FIN Lista de Establecimientos -->			
                </div>
            </div>
        </div>
    </div>
</div>
@endsection