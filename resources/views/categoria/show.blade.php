@extends('base')

@section('content')
    <div class="card">
        <div class="card-header">
            <i>Editar Categoria</i>
        </div>
        <div class="card-body">
            <h5 class="card-title text-center">Formulario de Categoria</h5>
            <form id="form-categoria" method="POST" action="{{route('categoria-actualizar', ['id'=>$categoria->id])}}">
            @csrf
            <label for="nombreCategoria" class="form-label">Nombre Categoria</label>
            <input type="text" required class="form-control" placeholder="Ingrese el nombre de la categoria" id="nombreCategoria" name="nombreCategoria" value="{{$categoria->nombreCategoria}}">
            <div class="form-check mt-3">
                <input class="form-check-input" type="checkbox" value="{{$categoria->activo}}" id="activo" name="activo" {{$categoria->activo == 1 ? 'checked': ''}}>
                <label class="form-check-label" for="activo">
                    Activo
                </label>
                </div>
                <div class="mt-1 d-flex justify-content-end">
                    <button type="submit" class="btn btn-success">Actualizar Categoria</button>
                </div>
        </form>
        </div>
    </div>

@endsection