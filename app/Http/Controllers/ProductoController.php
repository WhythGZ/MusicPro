<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Marca;
use App\Models\SubCategoria;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categorias = Categoria::all();
        $subcategorias = SubCategoria::all();
        $marcas = Marca::all();
        if($request->ajax()){
            $productos = Producto::all();
            return DataTables::of($productos)
            ->addColumn('action', function($productos){
                $acciones = '<a href="/dev-producto/'.$productos->id.'"class="btn btn-info btn-sm">Editar</a>';
                $acciones .= '<form action="/eliminar-producto/'.$productos->id.'"><button type="submit" id="'.$productos->id.'" name="delete" class="btn btn-danger btn-sm">Eliminar</button></form>' ;
                return $acciones;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        return view('producto.index')->with(compact('categorias', 'subcategorias','marcas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $categorias = Categoria::all();
        $subcategorias = SubCategoria::all();
        $marcas = Marca::all();
        $producto = new Producto();
        $producto->nombreProducto = $request->nombreProducto;
        $producto->precioProducto = $request->precioProducto;
        $producto->stockProducto = $request->stockProducto;
        $producto->marcaProducto = $request->marcaProducto;
        $producto->categoriaProducto = $request->categoriaProducto;
        $producto->subCategoria = $request->subCategoria;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('public/images');
            $producto->image_path = 'storage/images/' . $image->hashName();
        }else{
            $producto->image_path = '';
        }
        if($request->activo == 1){
            $producto->activo = $request->activo;
        }else{
            $producto->activo = 0;
        }
        $producto->save();
        return view('producto.index')->with(compact('categorias','subcategorias','marcas'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $categorias = Categoria::all();
        $subcategorias = SubCategoria::all();
        $marcas = Marca::all();
        $producto = Producto::find($id);
        return view('producto.show', compact('producto','subcategorias', 'categorias', 'marcas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $categorias = Categoria::all();
        $subcategorias = SubCategoria::all();
        $marcas = Marca::all();
        $producto = Producto::find($id);
        $producto->nombreProducto = $request->nombreProducto;
        $producto->precioProducto = $request->precioProducto;
        $producto->stockProducto = $request->stockProducto;
        $producto->marcaProducto = $request->marcaProducto;
        $producto->categoriaProducto = $request->categoriaProducto;
        $producto->subCategoria = $request->subCategoria;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('public/images');
            $producto->image_path = 'storage/images/' . $image->hashName();
        }else{
            $producto->image_path = '';
        }
        if($request->activo == 1){
            $producto->activo = $request->activo;
        }else{
            $producto->activo = 0;
        }
        $producto->save();
        return view('producto.index')->with(compact('producto','categorias','subcategorias','marcas'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $categorias = Categoria::all();
        $productos = SubCategoria::all();
        $marcas = Marca::all();
        Producto::find($id)->delete();
        return redirect("/dev-productos")->with(compact('categorias','subcategorias','marcas'));
    }
}
