@extends('base')

@section('content')
    <div class="card">
        <div class="card-header">
            <i>Editar Marca</i>
        </div>
        <div class="card-body">
            <h5 class="card-title text-center">Formulario de Marca</h5>
            <form id="form-marca" method="POST" action="{{route('marca-actualizar', ['id'=>$marca->id])}}">
            @csrf
            <label for="nombreMarca" class="form-label">Nombre Marca</label>
            <input type="text" required class="form-control" placeholder="Ingrese el nombre de la marca" id="nombreMarca" name="nombreMarca" value="{{$marca->nombreMarca}}">
            <div class="form-check mt-3">
                <input class="form-check-input" type="checkbox" value="{{$marca->activo}}" id="activo" name="activo" {{$marca->activo == 1 ? 'checked': ''}}>
                <label class="form-check-label" for="activo">
                    Activo
                </label>
                </div>
                <div class="mt-1 d-flex justify-content-end">
                    <button type="submit" class="btn btn-success">Actualizar Marca</button>
                </div>
        </form>
        </div>
    </div>

@endsection