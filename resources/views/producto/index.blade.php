@extends('base')

@section('content')
<ul class="nav nav-tabs">
    <li class="nav-item" role="presentation">
      <a class="nav-link active" id="list-tab" data-bs-toggle="tab" href="#list" role="tab" aria-controls="list" aria-selected="true">Lista Productos</a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link" id="form-tab" data-bs-toggle="tab" href="#form" role="tab" aria-controls="form" aria-selected="false">Nuevo Producto</a>
    </li>
</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="list" role="tabpanel" aria-labelledby="list-tab">
        <h3>Lista de Productos</h3>

        <table id="tabla-producto" class="table table-hover">
          <thead>
              <td>Id</td>
              <td>Nombre</td>
              <td>Precio</td>
              <td>Stock</td>
              <td>Marca</td>
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
                <i>Nuevo Producto</i>
            </div>
            <div class="card-body">
                <h5 class="card-title text-center">Formulario de Producto</h5>
                <form id="form-marca" method="POST" action="{{route('producto-registrar')}}">
                    @csrf
                    <label for="nombreProducto" class="form-label mt-3">Nombre Producto</label>
                    <input type="text" required class="form-control" placeholder="Ingrese el nombre del producto" id="nombreProducto" name="nombreProducto">
                    <label for="precioProducto" class="form-label mt-3">Precio Producto</label>
                    <input type="number" required class="form-control" placeholder="Ingrese el precio del producto" id="precioProducto" name="precioProducto">
                    <label for="stockProducto" class="form-label mt-3">Stock Producto</label>
                    <input type="number" required class="form-control" placeholder="Ingrese el stock del producto" id="stockProducto" name="stockProducto">
                    <label for="marcaProducto" class="form-label">Marca</label>
                    <select class="form-select" name="marcaProducto" id="marcaProducto">
                        <option selected hidden>Seleccione una Marca</option>
                        @foreach ($marcas as $marca)
                            @if ($marca->activo==1)
                                <option value="{{$marca->id}}">{{$marca->nombreMarca}}</option>
                            @endif
                        @endforeach
                    </select>

                    <label for="categoriaProducto" class="form-label">Categoria</label>
                    <select class="form-select" name="categoriaProducto" id="categoriaProducto">
                        <option selected hidden>Seleccione una Categoria</option>
                        @foreach ($categorias as $categoria)
                            @if ($categoria->activo==1)
                                <option value="{{$categoria->id}}">{{$categoria->nombreCategoria}}</option>
                            @endif
                        @endforeach
                    </select>

                    <label for="subCategoria" class="form-label">Subcategoria</label>
                    <select class="form-select" name="subCategoria" id="subCategoria">
                        <option selected hidden value="0">Seleccione una Subcategoria</option>
                        @foreach ($subcategorias as $subcategoria)
                            @if ($subcategoria->activo==1)
                                <option value="{{$subcategoria->id}}">{{$subcategoria->nombreSubCategoria}}</option>
                            @endif
                        @endforeach
                    </select>
                    
                    <label for="image_path" class="form-label mt-3">Imagen Producto</label>
                    <input type="file" required class="form-control" id="image_path" name="image_path">

                    <div class="form-check mt-3">
                        <input class="form-check-input" type="checkbox" value="1" id="activo" name="activo">
                        <label class="form-check-label" for="activo">
                        Activo
                        </label>
                    </div>
                    <div class="mt-1 d-flex justify-content-end">
                        <button type="submit" class="btn btn-success">Crear Producto</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
  $(document).ready(function(){
      var tablaCategoria = $('#tabla-producto').DataTable({
          processing:true,
          serverSide:true,
          ajax:{
              url: "{{route('productos-mantenedor')}}",
          },
          columns:[
              {data: 'id'},
              {data: 'nombreProducto'},
              {data: 'precioProducto'},
              {data: 'stockProducto'},
              {data: 'marcaProducto'},
              {data: 'categoriaProducto'},
              {data: 'subCategoria'},
              {data: 'activo'},
              {data: 'action', orderable: false}
          ]
      });
  });
</script>
@endsection