@extends('layouts.app')

@section('content')
<div class="container">

    @include('layouts.menu')
    

    <div class="row">
        <div class="col-md-8 col-md-offset-2">



            <div class="panel panel-default">
                <div class="panel-heading">Inicio</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    Bienvenidos
                </div>
            </div>


        </div>
    </div>

 
    
 

</div>
@endsection
