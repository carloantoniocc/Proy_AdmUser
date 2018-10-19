@extends('layouts.app')

@section('content')
<div class="container-fluid">
	<!--Mensajes de Guardado o Actualización de Establecimientos-->
	<?php $message=Session::get('message') ?>
	@if($message == 'store')
		<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			Categoria Creada Exitosamente
		</div>
	@elseif($message == 'update')
		<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			Categoria Modificada Exitosamente
		</div>
	@endif
	<!--FIN Mensajes de Guardado o Actualización de Establecimientos-->
    <div class="row">
        <div class="col-md-8 col-md-offset-2">


            <ol class="breadcrumb">
              <li><a href="/home">Home</a></li>
              <li class="active">Lista de Categorias</li>
            </ol>


            <div class="panel panel-default">
                <div class="panel-heading">Lista de Categorias</div>
                <div class="panel-body">
                    {{ csrf_field() }} 
					<div class="row">
						<!-- Boton Crear Nueva Establecimiento -->
						<div class="col-md-6">
							<a class="btn btn-sm btn-primary" href="{{ URL::to('Categorie/create') }}">Crear Categoria</a>
						</div>
						
						<form class="navbar-form navbar-left" role="search" method="GET" action="/Categorie/">
					 		<div class="form-group">
	    						<input type="text" name="name"  value="{{ old('name') }}" class="form-control" placeholder="Buscar Categoria" pattern="[a-zA-ZÑñ0-9]{1,50}" >
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
								  @foreach($categories as $categorie)

								  <tr>
									<td>{{ $categorie->id }}</td>
									<td>{{ $categorie->name }}</td>

									<td>
										@if( $categorie->active == 1 )
											Activo
										@else
											Inactivo
										@endif
									</td>
									
									<td><a href="{{ URL::to('Categorie/' . $categorie->id . '/edit') }}">Editar</a></td>
								  </tr>
								  @endforeach
								</tbody>
							</table>
							<!--paginacion-->

						</div>
					</div>
					<!-- FIN Lista de Establecimientos -->			
                </div>
            </div>
        </div>
    </div>
</div>
@endsection