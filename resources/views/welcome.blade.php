@extends('layouts.app')

@section('content')

 
        <div class="flex-center position-ref full-height">


            <div class="row">
                <div class="col-md-10 col-md-offset-1">


                    <div class="panel panel-default">
                        <div class="panel-heading">Listado de Funcionarios </div>
                        <div class="panel-body">
                            {{ csrf_field() }} 
                            <div class="row">    
                                <div class="col-md-6">
                                    <p><a class="btn btn-sm btn-primary" href="{{ URL::to('search') }}">Buscar Funcionario</a></p>
                                </div>                            
                            </div>    

                            </br>

                            <div class="row">
                                <div class="table-responsive">
                                    <table class="table employes table-bordered table-striped table-condensed">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Anexo</th> 
                                                <th class="text-center">Apellido Paterno</th>
                                                <th class="text-center">Apellido Materno</th>                                  
                                                <th class="text-center">Nombres</th>
                                                <th class="text-center">Correo Electronico</th>
                                                <th class="text-center">Departamento</th>
                                                <th class="text-center">Piso</th>
                                                <th class="text-center">Establecimiento</th>
                                            

                                            </tr>
                                        </thead>
                                        <tbody>
                                          @foreach($employes as $employe)

                                            <tr>
                                                <td class="text-right">{{ $employe->anexo }}</td>
                                                <td><small>{{ $employe->ape_paterno }}</small></p></td>
                                                <td><small>{{ $employe->ape_materno }}<small></td>
                                                <td><small>{{ $employe->name }}<small></td>
                                                <td class="text-right"><small>{{ $employe->email }}<small></td>    
                                                <td class="text-right"><small>{{ $employe->departamento }}<small></td>
                                                <td class="text-right"><small>{{ $employe->piso }}<small></td>
                                                <td class="text-right"><small>{{ $employe->establecimiento }}<small></td>    

                                            </tr>
                                          @endforeach
                                        </tbody>

                                    </table>
                                    <div class="text-right">    
                                        Total de registros : {{  $employes->total() }}
                                    </div>
                                    <div class="text-center">
                                            {{ $employes->appends(request()->input())->links() }}
                                    </div>        
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection