@extends('base')

@section('content')
<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
      <a class="nav-link active" id="list-tab" data-bs-toggle="tab" href="#list" role="tab" aria-controls="list" aria-selected="true">Lista de Usuarios</a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link" id="form-tab" data-bs-toggle="tab" href="#form" role="tab" aria-controls="form" aria-selected="false">Nueva Marca</a>
    </li>
</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="list" role="tabpanel" aria-labelledby="list-tab">
        <div class="card">
            <div class="card-header">
                <i>Lista de Marcas</i>
            </div>
            <div class="card-body">
              <h5 class="card-title text-center">Listado de Marcas</h5>
              <table id="tabla-marca" class="table table-hover">
                <thead>
                    <td>Id</td>
                    <td>Nombre</td>
                    <td>Activo</td>
                    <td>Acciones</td>
                </thead>
                <tbody></tbody>
            </table>
            </div>
          </div>
    </div>
    <div class="tab-pane fade" id="form" role="tabpanel" aria-labelledby="form-tab">
        <div class="card">
            <div class="card-header">
                <i>Nueva Marca</i>
            </div>
            <div class="card-body">
                <h5 class="card-title text-center">Formulario de Marca</h5>
                <form id="form-marca" method="POST" action="{{route('marca-registrar')}}">
                    @csrf
                    <label for="nombreMarca" class="form-label">Nombre Marca</label>
                    <input type="text" required class="form-control" placeholder="Ingrese el nombre de la marca" id="nombreMarca" name="nombreMarca">
                    <div class="form-check mt-3">
                        <input class="form-check-input" type="checkbox" value="1" id="activo" name="activo">
                        <label class="form-check-label" for="activo">
                        Activo
                        </label>
                    </div>
                    <div class="mt-1 d-flex justify-content-end">
                        <button type="submit" class="btn btn-success">Crear Marca</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function(){
    var tablaMarca = $('#tabla-marca').DataTable({
        processing:true,
        serverSide:true,
        ajax:{
            url: "{{route('marcas-mantenedor')}}",
        },
        columns:[
            {data: 'id'},
            {data: 'nombreMarca'},
            {data: 'activo'},
            {data: 'action', orderable: false}
        ]
    });
});
</script>

@endsection