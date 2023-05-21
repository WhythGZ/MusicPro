<?php

namespace App\Http\Controllers;

use App\Models\SubCategoria;
use App\Http\Requests\StoreSubCategoriaRequest;
use App\Http\Requests\UpdateSubCategoriaRequest;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SubCategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categorias = Categoria::all();
        if($request->ajax()){
            $subcategorias = SubCategoria::all();
            return DataTables::of($subcategorias)
            ->addColumn('action', function($subcategorias){
                $acciones = '<a href="/dev-subcategoria/'.$subcategorias->id.'"class="btn btn-info btn-sm">Editar</a>';
                $acciones .= '<form action="/eliminar-subcategoria/'.$subcategorias->id.'"><button type="submit" id="'.$subcategorias->id.'" name="delete" class="btn btn-danger btn-sm">Eliminar</button></form>' ;
                return $acciones;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        return view('subcategoria.index')->with(compact('categorias'));
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
        $subcategoria = new SubCategoria();
        $subcategoria->id_categoria = $request->id_categoria;
        $subcategoria->nombreSubCategoria = $request->nombreSubCategoria;
        if($request->activo == 1){
            $subcategoria->activo = $request->activo;
        }else{
            $subcategoria->activo = 0;
        }
        $subcategoria->save();
        return view('subcategoria.index')->with(compact('categorias'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $subcategoria = SubCategoria::find($id);
        $categorias = Categoria::all();
        return view('subcategoria.show', compact('subcategoria', 'categorias'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubCategoria $subCategoria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $categorias = Categoria::all();
        $subcategoria = SubCategoria::find($id);
        $subcategoria->id_categoria = $request->id_categoria;
        $subcategoria->nombreSubCategoria = $request->nombreSubCategoria;
        if($request->activo == 1){
            $subcategoria->activo = $request->activo;
        }else{
            $subcategoria->activo = 0;
        }
        $subcategoria->save();
        return view('subcategoria.index')->with(compact('categorias'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $categorias = Categoria::all();
        SubCategoria::find($id)->delete();
        return redirect("/dev-subcategorias")->with(compact('categorias'));
    }
}
