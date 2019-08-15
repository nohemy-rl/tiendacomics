@extends('layouts.layout')
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="row">
                    <h3>Sucursales</h3>
              </div>
        </div>
        <div class="card-body">
          {!! BootForm::open(['model' => $sucursal, 'store' => 'sucursal.store', 'update' => 'sucursal.update', 'id' => 'form']); !!}
        
          <div class=" input-group mb-3">
            {!! BootForm::text("nombre", "Nombre de la sucursal", old("nombre")); !!}
              </div>
        <div class="row">
          <div class="col-md-12">
              {!! Form::submit('Guardar', ["class" => "btn btn-primary"]); !!}
              <a href="{!! url('/sucursal') !!}" class="text-danger float-middle ml-4">Cancelar</a>
          </div>
          </div>
          {!! BootForm::close() !!}
      </div>
    </div>
</div>
@endsection
@section('scriptBFile')
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>

<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
{!! $validator !!}
@endsection
