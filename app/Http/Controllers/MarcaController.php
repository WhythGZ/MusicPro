<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use App\Http\Requests\StoreMarcaRequest;
use App\Http\Requests\UpdateMarcaRequest;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $marcas = Marca::all();
            return DataTables::of($marcas)
            ->addColumn('action', function($marcas){
                $acciones = '<a href="/dev-marcas/'.$marcas->id.'"class="btn btn-info btn-sm">Editar</a>';
                $acciones .= '<form action="/eliminar-marca/'.$marcas->id.'"><button type="submit" id="'.$marcas->id.'" name="delete" class="btn btn-danger btn-sm">Eliminar</button></form>' ;
                return $acciones;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        return view('marca.index');
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
        $marca = new Marca();
        $marca->nombreMarca = $request->nombreMarca;
        if($request->activo == 1){
            $marca->activo = $request->activo;
        }else{
            $marca->activo = 0;
        }
        $marca->save();
        return view('marca.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $marca = Marca::find($id);
        return view('marca.show', compact('marca'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Marca $marca)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $marca = Marca::find($id);
        $marca->nombreMarca = $request->nombreMarca;
        if($request->activo == 1){
            $marca->activo = $request->activo;
        }else{
            $marca->activo = 0;
        }
        $marca->save();
        return view('marca.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Marca::find($id)->delete();
        return redirect("/dev-marcas");
    }
}
