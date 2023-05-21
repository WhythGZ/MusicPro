@extends('base')

@section('content')
    <div class="card">
        <div class="card-header">
            <i>Editar SubCategoria</i>
        </div>
        <div class="card-body">
            <h5 class="card-title text-center">Formulario de SubCategoria</h5>
            <form id="form-subcategoria" method="POST" action="{{route('subcategoria-actualizar', ['id'=>$subcategoria->id])}}">
            @csrf
            <label for="id_categoria" class="form-label">Categoria</label>
            <select class="form-select" name="id_categoria" id="id_categoria">
                @foreach ($categorias as $categoria)
                    @if ($categoria->activo==1)
                        @if ($categoria->id == $subcategoria->id_categoria)
                            <option value="{{$subcategoria->id_categoria}}" selected>{{$categoria->nombreCategoria}}</option>
                        @else
                        <option value="{{$categoria->id}}">{{$categoria->nombreCategoria}}</option>
                        @endif
                    @endif
                @endforeach
            </select>
            <label for="nombreSubCategoria" class="form-label">Nombre SubCategoria</label>
            <input type="text" required class="form-control" placeholder="Ingrese el nombre de la subcategoria" id="nombreSubCategoria" name="nombreSubCategoria" value="{{$subcategoria->nombreSubCategoria}}">
            <div class="form-check mt-3">
                <input class="form-check-input" type="checkbox" value="{{$subcategoria->activo}}" id="activo" name="activo" {{$subcategoria->activo == 1 ? 'checked': ''}}>
                <label class="form-check-label" for="activo">
                    Activo
                </label>
                </div>
                <div class="mt-1 d-flex justify-content-end">
                    <button type="submit" class="btn btn-success">Actualizar SubCategoria</button>
                </div>
        </form>
        </div>
    </div>

@endsection