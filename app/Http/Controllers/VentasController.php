<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Venta;
use Illuminate\Http\Request;

class VentasController extends Controller
{
    public function index()
    {
       
        $ventas = venta::select('ventas.*', 'productos.*')
                ->join('productos', 'ventas.id_producto', '=', 'productos.id')
                ->get();
        return view('ventas.index', [
            'ventas' => $ventas,
        ]);
    }

    public function new()
    {
    $ventas = Producto::all();
    return view('ventas.nuevo', [
            'ventas' => $ventas,
        ]);
    }

    public function guardar(Request $request)
    {
        $request->validate([
            'id_producto' => 'required',
            'cantidad' => 'required',
        ]);
        $producto = Producto::select(['productos.*'])
        ->where('productos.id', $request->id_producto)
        ->first();
        $producto->stock = $producto->stock - $request->cantidad ;
        $producto->update();
        $guardar = new Venta();
        $guardar->id_producto = $request->id_producto;
        $guardar->cantidad = $request->cantidad;
      
        if ($guardar->save()) {
            $ventas = venta::select('ventas.*', 'productos.*')
                ->join('productos', 'ventas.id_producto', '=', 'productos.id')
                ->get();
        return view('ventas.index', [
            'ventas' => $ventas,
        ]);
        }
    }
}
