<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Http\Requests\StoreCategoriaRequest;
use App\Http\Requests\UpdateCategoriaRequest;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $categorias = Categoria::all();
            return DataTables::of($categorias)
            ->addColumn('action', function($categorias){
                $acciones = '<a href="/dev-categorias/'.$categorias->id.'"class="btn btn-info btn-sm">Editar</a>';
                $acciones .= '<form action="/eliminar-categoria/'.$categorias->id.'"><button type="submit" id="'.$categorias->id.'" name="delete" class="btn btn-danger btn-sm">Eliminar</button></form>' ;
                return $acciones;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        return view('categoria.index');
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
        $categoria = new Categoria();
        $categoria->nombreCategoria = $request->nombreCategoria;
        if($request->activo == 1){
            $categoria->activo = $request->activo;
        }else{
            $categoria->activo = 0;
        }
        $categoria->save();
        return view('categoria.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $categoria = Categoria::find($id);
        return view('categoria.show', compact('categoria'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categoria $categoria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $categoria = Categoria::find($id);
        $categoria->nombreCategoria = $request->nombreCategoria;
        if($request->activo == 1){
            $categoria->activo = $request->activo;
        }else{
            $categoria->activo = 0;
        }
        $categoria->save();
        return view('categoria.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Categoria::find($id)->delete();
        return redirect("/dev-categorias");
    }
}
