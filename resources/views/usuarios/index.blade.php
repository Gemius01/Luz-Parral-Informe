@extends('layouts.app')

@section('content')
<div class="container"><!--container class -->
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-header">Usuarios
                
                    <a href="{{ route('users.create')}}"
                    class="btn btn-sm btn-primary pull-right">Crear</a>
                
                </div>
                <div class="card-body" width="100%">
                   <table class="table table-striped table-hover table-bordered" width="100%">
                       <thead>
                           <tr>
                               <th>Nombre</th>
                               <th>Username</th>
                               <th colspan="5"><center>Opciones</center></th>
                           </tr>
                       </thead>
                       <tbody>
                           @foreach($users as $user)
                           <tr>
                               <td>{{ $user->name }}</td>
                               <td>{{ $user->email }}</td>
                               
                               <td width="10px">
                                   <a href="{{ route('users.edit', $user->id) }}"
                                    class="btn btn-sm btn-success">Editar</a>
                               </td>
                               
                              
                               <td width="10px">
                                    {!! Form::open(['route' => ['users.destroy', $user->id],
                                    'method' => 'DELETE']) !!}
                                        <button onclick="return confirm('¿Esta seguro de eliminar?')" class="btn btn-sm btn-danger">
                                            Eliminar
                                        </button>
                                {!! Form::close() !!}
                               </td>
                              
                           </tr>
                           @endforeach
                       </tbody>
                   </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
