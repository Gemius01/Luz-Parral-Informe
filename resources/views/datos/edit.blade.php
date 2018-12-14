@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edición de Datos
                     
                </div>
                <div class="card-body">
                   {!! Form::model($dato, ['route' => ['datos.update', $dato->id],
                    'method' => 'PUT']) !!}

                        @include('datos.partials.formedit')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection