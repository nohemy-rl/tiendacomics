@extends('layouts.layout')
@section('content')
  <div class="container">
      <div class="row">
      @forelse ($comics as $comic)
          <div class="row">
              <div class="col-md-6">
                <img src="{{$comic['thumbnail']['path'].'.'.$comic['thumbnail']['extension']}}" class="img-fluid">
              </div>
              <div class="col-md-6">
                <div class="row">
                  <h2>{{ $comic['title'] }}</h2>
                </div>
                <div class="row">
                  <label class="col-sm-5">Fecha de lanzamiento :</label>
                  <div class="col-sm-7"><strong>
                      {{date("d/m/Y",strtotime($comic['dates'][0]['date']))}}
                  </strong></div>
                </div>
                <div class="row">
                  <label class="col-sm-5">Páginas : </label>
                  <div class="col-sm-7"><strong>{{ $comic['pageCount'] }}  </strong></div>
                </div>
                <div class="row">
                  <label class="col-sm-5">Descripción : </label>
                  <div class="col-sm-7 text-justify"><strong>{{ $comic['description'] }}  </strong></div>
                </div>
                <div class="row">
                  <label class="col-sm-5">Personajes : </label>
                  <div class="col-sm-7">
                    <strong>
                      @forelse ($personajes as $personaje)
                        <div class="row form-group">
                          <div class="col-md-6 text-center text-middle">
                            {{$personaje['name']}}
                          </div>
                          <div class="col-md-6">
                            <img src="{{$personaje['thumbnail']['path'].'.'.$personaje['thumbnail']['extension']}}" class="img-fluid">
                          </div>
                      </div>
                      @empty
                          <div class="row">No existe información para este apartado</div>
                      @endforelse
                    </strong>
                  </div>
                </div>

          </div>
          </div>
      @empty
          <div class="row">No existe información para este apartado</div>
      @endforelse

  </div>
  <div>
    <a class="btn btn-link" href="{!! url('/comics') !!}">Regresar</a>
  </div>
</div>
@endsection
