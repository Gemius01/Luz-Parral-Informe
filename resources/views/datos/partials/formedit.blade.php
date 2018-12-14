<div class="form-group">
	{{ Form::label('rut_empresa', 'Rut Empresa') }}
	{{ Form::text('rut_empresa', null, ['class' => 'form-control', 'id' => 'rut_empresa']) }}
	@if($errors->has('rut_empresa'))
	@foreach($errors->get('rut_empresa',":message") as $error)
	<p class="alert alert-danger alert-dismissible" >{{$error}}</p>
	@endforeach
	@endif
</div>
<div class="form-group">
	{{ Form::label('dv', 'DV') }}
	{{ Form::text('dv', null, ['class' => 'form-control', 'id' => 'dv']) }}
	@if($errors->has('dv'))
	@foreach($errors->get('dv',":message") as $error)
	<p class="alert alert-danger alert-dismissible" >{{$error}}</p>
	@endforeach
	@endif
</div>
<div class="form-group">
	{{ Form::label('cod_empresa', 'Código Empresa') }}
	{{ Form::text('cod_empresa', null, ['class' => 'form-control', 'id' => 'cod_empresa']) }}
	@if($errors->has('cod_empresa'))
	@foreach($errors->get('cod_empresa',":message") as $error)
	<p class="alert alert-danger alert-dismissible" >{{$error}}</p>
	@endforeach
	@endif
</div>
<div class="form-group">
	{{ Form::label('region', 'Número Región') }}
	{{ Form::text('region', null, ['class' => 'form-control', 'id' => 'region']) }}
	@if($errors->has('region'))
	@foreach($errors->get('region',":message") as $error)
	<p class="alert alert-danger alert-dismissible" >{{$error}}</p>
	@endforeach
	@endif
</div>

<div class="form-group">
	<center>
	<button type="submit"  class="btn btn-sm btn-primary" name="submitBtn" onclick="this.disabled=true;this.form.submit();">Guardar</button>
	</center>
</div>