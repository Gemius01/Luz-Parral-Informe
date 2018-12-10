@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Usuario
                     <a href="{{ route('users.editpassword', $user->id)}}"
                    class="btn btn-sm btn-primary pull-right">Editar Contraseña</a>
                </div>
                <div class="card-body">
                   {!! Form::model($user, ['route' => ['users.update', $user->id],
                    'method' => 'PUT']) !!}

                        @include('usuarios.partials.formedit')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection