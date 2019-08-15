@extends('layouts.layout')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8">
                        <h3>Administración de sucursales</h3>
                    </div>
                    <div class="col-md-4">
                      <a href="{{ route('sucursal.create') }}" class="btn btn-primary float-right">
                          Agregar
                      </a>
                    </div>
                </div>
            </div>

                    <table class="table">
                        <thead class="thead-dark" style="display:{{($sucursales->count()) ? 'show' : 'none'}}">
                            <tr>
                                <th>Nombre</th>
                                <th>Modificar</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($sucursales as $sucursal)
                            <tr>
                                <td> {{ $sucursal->nombre }} </td>
                                <td>
                                    <a href="{{ route('sucursal.edit', $sucursal->id) }}" class="btn btn-link">
                                      <span class="oi oi-pencil"></span></a>
                                </td>
                                <td>
                                  {!! Form::model($sucursal, ['method' => 'delete', 'route' => ['sucursal.destroy',$sucursal->id]]) !!}
                                  <a class="text text-danger eliminar" style="cursor: pointer"  >
                                      <span class="oi oi-trash"></span>
                                  </a>
                                  {!! Form::close() !!}

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
@section('scriptBFile')

<script>
    $(document).ready(function() {

        $('.eliminar').on('click', function(event) {
            event.preventDefault();
            if (confirm('¿Desea eliminar el registro?')) { $(this).closest('form').submit(); }
        });
        
    });
</script>
@endsection
