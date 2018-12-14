@extends('layouts.app')

@section('content')
<div class="container"><!--container class -->
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-header">
                    Datos
                </div>
                <div class="card-body" width="100%">
                   <table class="table table-striped table-hover table-bordered" width="100%">
                       <thead>
                           <tr>
                               <th>Rut Empresa</th>
                               <th>DV</th>
                               <th>Código de la Empresa STI</th>
                               <th>Región</th>
                               <th colspan="5"><center>Opciones</center></th>
                           </tr>
                       </thead>
                       <tbody>
                           
                           <tr>
                               <td>{{ $datos->rut_empresa }}</td>
                               <td>{{ $datos->dv }}</td>
                               <td>{{ $datos->cod_empresa }}</td>
                               <td>{{ $datos->region }}</td>
                               <td style="text-align:center;">
                                   <a href="{{ route('datos.edit', $datos->id) }}"
                                    class="btn btn-sm btn-success">Editar</a>
                               </td>                            
                           </tr>
                          
                       </tbody>
                   </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
