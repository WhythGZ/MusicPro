@extends('base')

@section('content')
<ul class="nav nav-tabs">
    <li class="nav-item" role="presentation">
      <a class="nav-link active" id="list-tab" data-bs-toggle="tab" href="#list" role="tab" aria-controls="list" aria-selected="true">Lista Categorias</a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link" id="form-tab" data-bs-toggle="tab" href="#form" role="tab" aria-controls="form" aria-selected="false">Nueva Categoria</a>
    </li>
</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="list" role="tabpanel" aria-labelledby="list-tab">
        
        <h3>Lista de Categorias</h3>
        
        <table id="tabla-categoria" class="table table-hover">
            <thead>
                <td>Id</td>
                <td>Nombre</td>
                <td>Activo</td>
                <td>Acciones</td>
            </thead>
            <tbody></tbody>
        </table>
    </div>
    <div class="tab-pane fade" id="form" role="tabpanel" aria-labelledby="form-tab">
        <div class="card">
            <div class="card-header">
                <i>Nueva Categoria</i>
            </div>
            <div class="card-body">
                <h5 class="card-title text-center">Formulario de Categoria</h5>
                <form id="form-categoria" method="POST" action="{{route('categoria-registrar')}}">
                    @csrf
                    <label for="nombreCategoria" class="form-label">Nombre Categoria</label>
                    <input type="text" required class="form-control" placeholder="Ingrese el nombre de la categoria" id="nombreCategoria" name="nombreCategoria">
                    <div class="form-check mt-3">
                        <input class="form-check-input" type="checkbox" value="1" id="activo" name="activo">
                        <label class="form-check-label" for="activo">
                        Activo
                        </label>
                    </div>
                    <div class="mt-1 d-flex justify-content-end">
                        <button type="submit" class="btn btn-success">Crear Categoria</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        var tablaCategoria = $('#tabla-categoria').DataTable({
            processing:true,
            serverSide:true,
            ajax:{
                url: "{{route('categorias-mantenedor')}}",
            },
            columns:[
                {data: 'id'},
                {data: 'nombreCategoria'},
                {data: 'activo'},
                {data: 'action', orderable: false}
            ]
        });
    });
</script>
@endsection