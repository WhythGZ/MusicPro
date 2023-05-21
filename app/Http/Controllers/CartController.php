<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function shop(){
        $productos = Producto::all();
        return view('store')->with(['productos'=>$productos]);
    }

    public function cart(){
        $cartCollection = \Cart::getContent();
        return view('cart')->with(['cartCollection'=>$cartCollection]);
    }

    public function remove(Request $request){
        \Cart::remove($request->id);
        return redirect()->route('cart.index')->with('success_msg', 'Producto Removido!');
    }

    public function add(Request$request){
        \Cart::add(array(
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->img,
                'slug' => $request->slug
            )
        ));
        return redirect()->route('cart.index')->with('success_msg', 'Producto Agregado!');
    }

    public function update(Request $request){
        \Cart::update($request->id,
            array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $request->quantity
                ),
        ));
        return redirect()->route('cart.index')->with('success_msg', 'Carrito Actualizado!');
    }

    public function clear(){
        \Cart::clear();
        return redirect()->route('cart.index')->with('success_msg', 'Carrito Vaciado!');
    }

}
