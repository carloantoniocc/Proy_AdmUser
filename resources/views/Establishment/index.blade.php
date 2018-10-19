@extends('layouts.app')

@section('content')
<div class="container-fluid">
	<!--Mensajes de Guardado o Actualización de Establecimientos-->
	<?php $message=Session::get('message') ?>
	@if($message == 'store')
		<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			Establecimiento Creado Exitosamente
		</div>
	@elseif($message == 'update')
		<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			Establecimiento Modificado Exitosamente
		</div>
	@endif
	<!--FIN Mensajes de Guardado o Actualización de Establecimientos-->
    <div class="row">
        <div class="col-md-8 col-md-offset-2">


            <ol class="breadcrumb">
              <li><a href="/home">Home</a></li>
              <li class="active">Lista de Establecimientos</li>
            </ol>

            <div class="panel panel-default">
                <div class="panel-heading">Lista de Establecimientos</div>
                <div class="panel-body">
                    {{ csrf_field() }} 
					<div class="row">
						<!-- Boton Crear Nueva Establecimiento -->
						<div class="col-md-6">
							<a class="btn btn-sm btn-primary" href="{{ URL::to('Establishment/create') }}">Crear Establecimiento</a>
						</div>

						<form class="navbar-form navbar-left" role="search" method="GET" action="/Establishment/">
					 		<div class="form-group">
	    						<input type="text" name="name"  value="{{ old('name') }}" class="form-control" placeholder="Buscar Establecimiento" pattern="[a-zA-ZÑñ0-9_. ]{1,100}" >
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
									<th>Código</th>
									<th>Nombre</th>
									<th>Estado</th>
									<th>Editar</th>
								  </tr>
								</thead>
								<tbody>
								  @foreach($establishments as $establishment)

								  <tr>
									<td>{{ $establishment->code }}</td>
									<td>{{ $establishment->name }}</td>
									<td>
										@if( $establishment->active == 1 )
											Activo
										@else
											Inactivo
										@endif
									</td>

									<td><a href="{{ URL::to('Establishment/' . $establishment->id . '/edit') }}">Editar</a></td>
								  </tr>
								  @endforeach
								</tbody>
							</table>
							<!--paginacion-->

                            <div class="text-right">    
                                Total de registros : {{  $establishments->total() }}
                            </div>
                            <div class="text-center">
                                 
                               {{ $establishments->appends(request()->input())->links() }}
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