@extends('layouts.layout')
@section('content')
    <div class="container">
      <div class="row">
        <h3>Listado de Comics</h3>
      </div>
        <div class="row">
        @forelse ($comics as $comic)
            <div class="col-xs-6 col-md-3 col-lg-3 form-group">
                <div class="row text-center">
                    <a href="{{url('comics/'.$comic['id'])}}">
                      <img src="{{$comic['thumbnail']['path'].'.'.$comic['thumbnail']['extension']}}" height="180px;">
                    </a>
                </div>
                <div class="row">
                    <a href="{{url('comics/'.$comic['id'])}}">
                        {{ $comic['title'] }}
                    </a>
                </div>
            </div>
        @empty
            <p>No existe información para este apartado</p>
        @endforelse
        </div>
    </div>
@endsection
