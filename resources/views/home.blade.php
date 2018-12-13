@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Fechas Reporte</div>
                {{ Form::open(['route' => 'reporte.search', 'id' => 'target']) }} 
                <div class="card-body">
                <div class="container">
                <div class="form-group col-md-12">
                    <label for="exampleFormControlSelect1">Fecha de INICIO</label>
                        <div class='input-group date' id='fecha_inicio'>
                        {{ Form::text('fecha_inicio', null, ['class' => 'form-control', 'required' => 'true', 'autocomplete'=>'off', 'onChange'=>'isValidDate(event)']) }}
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                    <label for="exampleFormControlSelect1">Fecha de TERMINO</label>
                        <div class='input-group date' id='fecha_termino'>
                            {{ Form::text('fecha_termino', null, ['class' => 'form-control', 'required' => 'true', 'autocomplete'=>'off', 'onChange'=>'isValidDate(event)']) }}
                            <span class="input-group-addon">
                                
                            </span>
                        </div>
                    </div>
                    <div class="form-group col-md-12" style="text-align:right;">
                    <button type="submit" class="btn btn-primary mb-2" onclick="this.disabled=true;this.form.submit();" style="margin-top:24px;" id="saveButton"> <i class="fa fa-search" aria-hidden="true"></i> Generar Reporte</button>
                    </div>
                    </div>
                    
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="progressDialog" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content">
	      <div class="modal-body" style="text-align:center;">
	      	
	        	<h4>Espere mientras se crea el reporte</h4>
	        	<p>puede tardar unos segundos, minutos u horas</p>
				<img src="{{ URL::to('/') }}/images/lg.-text-entering-comment-loader.gif" width="100" height="100" border="0">
	      </div>
	    </div>
	  </div>
	</div>
<script>
$(document).ready(function(){
    $('.date').datepicker({
        language: 'es',
        format: 'dd-mm-yyyy'
    });
    $("#saveButton").click(function() {
			setTimeout(function () {
        $('#progressDialog').modal('show');
    }, 500);
   	});
});

function isValidDate(e)
{
    // First check for the pattern
    var dateString = e.target.value
    if(!/^\d{1,2}\/\d{1,2}\/\d{4}$/.test(dateString))
        return false;

    // Parse the date parts to integers
    var parts = dateString.split("/");
    var day = parseInt(parts[1], 10);
    var month = parseInt(parts[0], 10);
    var year = parseInt(parts[2], 10);

    // Check the ranges of month and year
    if(year < 1000 || year > 3000 || month == 0 || month > 12)
        return false;

    var monthLength = [ 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31 ];

    // Adjust for leap years
    if(year % 400 == 0 || (year % 100 != 0 && year % 4 == 0))
        monthLength[1] = 29;

    // Check the range of the day
    return day > 0 && day <= monthLength[month - 1];
};
</script>
@endsection
