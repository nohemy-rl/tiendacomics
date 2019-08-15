@extends('layouts.layout')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8">
                        <h3>Comics por tienda</h3>
                    </div>
                </div>
            </div>

                    <table class="table">
                        <thead class="thead-dark" style="display:{{($sucursales->count()) ? 'show' : 'none'}}">
                            <tr>
                                <th>Nombre</th>
                                <th>Comics</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($sucursales as $sucursal)
                            <tr>
                                <td> {{ $sucursal->nombre }} </td>
                                <td>
                                  @php
                                    $limit=$sucursal->id*10;
                                  @endphp
                                    <a href="{{ route('comics.tienda',$limit) }}" class="btn btn-link">
                                      <span class="oi oi-eye"></span></a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5">No se ha registrado información en este apartado</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>


        </div>
    </div>
@endsection
