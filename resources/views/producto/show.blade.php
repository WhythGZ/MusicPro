@extends('base')

@section('content')
    <div class="card">
        <div class="card-header">
            <i>Editar Producto</i>
        </div>
        <div class="card-body">
            <h5 class="card-title text-center">Formulario de Producto</h5>
            <form id="form-producto" method="POST" action="{{route('producto-actualizar', ['id'=>$producto->id])}}" enctype="multipart/form-data">
            @csrf
            <label for="nombreProducto" class="form-label mt-3">Nombre Producto</label>
            <input type="text" required class="form-control" placeholder="Ingrese el nombre del producto" id="nombreProducto" name="nombreProducto" value="{{$producto->nombreProducto}}">
            <label for="precioProducto" class="form-label mt-3">Precio Producto</label>
            <input type="number" required class="form-control" placeholder="Ingrese el precio del producto" id="precioProducto" name="precioProducto" value="{{$producto->precioProducto}}">
            <label for="stockProducto" class="form-label mt-3">Stock Producto</label>
            <input type="number" required class="form-control" placeholder="Ingrese el stock del producto" id="stockProducto" name="stockProducto" value="{{$producto->stockProducto}}">
            <label for="marcaProducto" class="form-label">Marca</label>
            <select class="form-select" name="marcaProducto" id="marcaProducto">
                <option selected hidden>Seleccione una Marca</option>
                @foreach ($marcas as $marca)
                    @if ($marca->activo==1)
                        @if ($marca->id == $producto->marcaProducto)
                            <option value="{{$producto->marcaProducto}}" selected>{{$marca->nombreMarca}}</option>
                        @else
                        <option value="{{$marca->id}}">{{$marca->nombreMarca}}</option>
                        @endif
                    @endif
                @endforeach
            </select>

            <label for="categoriaProducto" class="form-label">Categoria</label>
            <select class="form-select" name="categoriaProducto" id="categoriaProducto">
                <option selected hidden>Seleccione una Categoria</option>
                @foreach ($categorias as $categoria)
                    @if ($categoria->activo==1)
                        @if ($categoria->id == $producto->categoriaProducto)
                            <option value="{{$producto->categoriaProducto}}" selected>{{$categoria->nombreCategoria}}</option>
                        @else
                        <option value="{{$categoria->id}}">{{$categoria->nombreCategoria}}</option>
                        @endif
                    @endif
                @endforeach
            </select>

            <label for="subCategoria" class="form-label">Subcategoria</label>
            <select class="form-select" name="subCategoria" id="subCategoria">
                <option selected hidden>Seleccione una Subcategoria</option>
                @foreach ($subcategorias as $subcategoria)
                    @if ($subcategoria->activo==1)
                        @if ($subcategoria->id == $producto->subCategoria)
                            <option value="{{$producto->subCategoria}}" selected>{{$subcategoria->nombreSubCategoria}}</option>
                        @else
                        <option value="{{$subcategoria->id}}">{{$subcategoria->nombreSubCategoria}}</option>
                        @endif
                    @endif
                @endforeach
            </select>
            
            <label for="image" class="form-label mt-3">Imagen Producto</label>
            <input type="file" required class="form-control" id="image" name="image" value="{{$producto->image_path}}">

            <div class="form-check mt-3">
                <input class="form-check-input" type="checkbox" value="{{$producto->activo}}" id="activo" name="activo" {{$producto->activo == 1 ? 'checked': ''}}>
                <label class="form-check-label" for="activo">
                    Activo
                </label>
                </div>
                <div class="mt-1 d-flex justify-content-end">
                    <button type="submit" class="btn btn-success">Actualizar Producto</button>
                </div>
        </form>
        </div>
    </div>

@endsection