@extends('layouts.layout')
@section('content')
    <div class="container">
      <div class="row">
        <h3>Listado de Comics</h3>
      </div>
        <div class="row">
        @forelse ($comics as $comic)
            <div class="row col-md-12">
                <div class="col-md-6">
                    {{ $comic['title'] }}
                </div>
                <div class="col-md-6">
                  {!! BootForm::checkboxElement('tienda',false,'1',old("tienda"), false);!!}
                </div>
            </div>
        @empty
            <p>No existe información para este apartado</p>
        @endforelse
        </div>
        <div>
          <a class="btn btn-link text-right" href="{!! url('/tiendas') !!}">Regresar</a>
        </div>
    </div>
@endsection
