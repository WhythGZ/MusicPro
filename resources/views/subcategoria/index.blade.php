@extends('base')

@section('content')
<ul class="nav nav-tabs">
    <li class="nav-item" role="presentation">
      <a class="nav-link active" id="list-tab" data-bs-toggle="tab" href="#list" role="tab" aria-controls="list" aria-selected="true">Lista SubCategorias</a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link" id="form-tab" data-bs-toggle="tab" href="#form" role="tab" aria-controls="form" aria-selected="false">Nueva SubCategoria</a>
    </li>
</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="list" role="tabpanel" aria-labelledby="list-tab">
        <h3>Lista de SubCategorias</h3>

        <table id="tabla-subcategoria" class="table table-hover">
          <thead>
              <td>Id</td>
              <td>Categoria</td>
              <td>SubCategoria</td>
              <td>Activo</td>
              <td>Acciones</td>
          </thead>
      </table>
    </div>
    <div class="tab-pane fade" id="form" role="tabpanel" aria-labelledby="form-tab">
        <div class="card">
            <div class="card-header">
                <i>Nueva Subcategoria</i>
            </div>
            <div class="card-body">
                <h5 class="card-title text-center">Formulario de Subcategoria</h5>
                <form id="form-marca" method="POST" action="{{route('subcategoria-registrar')}}">
                    @csrf
                    <label for="id_categoria" class="form-label">Categoria</label>
                    <select class="form-select" name="id_categoria" id="id_categoria">
                        <option selected hidden>Seleccione una Categoria</option>
                        @foreach ($categorias as $categoria)
                            @if ($categoria->activo==1)
                                <option value="{{$categoria->id}}">{{$categoria->nombreCategoria}}</option>
                            @endif
                        @endforeach
                    </select>
                    <label for="nombreSubCategoria" class="form-label mt-3">Nombre Subcategoria</label>
                    <input type="text" required class="form-control" placeholder="Ingrese el nombre de la subcategoria" id="nombreSubCategoria" name="nombreSubCategoria">
                    <div class="form-check mt-3">
                        <input class="form-check-input" type="checkbox" value="1" id="activo" name="activo">
                        <label class="form-check-label" for="activo">
                        Activo
                        </label>
                    </div>
                    <div class="mt-1 d-flex justify-content-end">
                        <button type="submit" class="btn btn-success">Crear Subcategoria</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
  $(document).ready(function(){
      var tablaCategoria = $('#tabla-subcategoria').DataTable({
          processing:true,
          serverSide:true,
          ajax:{
              url: "{{route('subcategorias-mantenedor')}}",
          },
          columns:[
              {data: 'id'},
              {data: 'id_categoria'},
              {data: 'nombreSubCategoria'},
              {data: 'activo'},
              {data: 'action', orderable: false}
          ]
      });
  });
</script>
@endsection

