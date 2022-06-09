<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    public function index()
    {
        $productos = Producto::all();

        return view('productos.index', [
            'productos' => $productos,
        ]);
    }

    public function new()
    {
        return view('productos.nuevo');
    }

    public function guardar(Request $request)
    {
        $request->validate([
            'nombre_producto' => 'required',
            'referencia' => ['required', 'unique:productos'],
            'precio' => 'required',
            'peso' => 'required',
            'categoria' => 'required',
            'stock' => 'required',
        ]);

        $guardar = new Producto();
        $guardar->nombre_producto = $request->nombre_producto;
        $guardar->referencia = $request->referencia;
        $guardar->precio = $request->precio;
        $guardar->peso = $request->peso;
        $guardar->categoria = $request->categoria;
        $guardar->stock = $request->stock;
        if ($guardar->save()) {
            $productos = Producto::all();

            return view('productos.index', [
                'productos' => $productos,
            ]);
        }
    }

    public function editGuardar(Request $request)
    {
        $productos = Producto::
            where('productos.id', $request->id)
            ->first();
        $productos->nombre_producto = $request->nombre_producto;
        $productos->referencia = $request->referencia;
        $productos->precio = $request->precio;
        $productos->peso = $request->peso;
        $productos->categoria = $request->categoria;
        $productos->stock = $request->stock;
        if ($productos->update()) {
            $productos = Producto::all();

            return view('productos.index', [
                'productos' => $productos,
            ]);
        }
    }

    public function editProducto($id)
    {
        $productos = Producto::
            where('productos.id', $id)
            ->first();

        return view('productos.edit', [
            'data' => $productos,
        ]);
    }

    public function deleteProducto(Request $request)
    {
        $productos = Producto::select(['productos.*'])
            ->where('productos.id', $request->id)
            ->first();

        if ($productos->delete()) {
            $xhr_response = 200;
        } else {
            $xhr_response = 400;
        }

        return $xhr_response;
    }
}
