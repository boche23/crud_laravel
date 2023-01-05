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
        if ($request->cantidad > 0) {
            # code...
            $producto = Producto::select(['productos.*'])
                ->where('productos.id', $request->id_producto)
                ->first();
            $producto->stock = $producto->stock - $request->cantidad;
            if ($producto->stock > 0) {
                $producto->update();
                $guardar = new Venta();
                $guardar->id_producto = $request->id_producto;
                $guardar->cantidad = $request->cantidad;

                if ($guardar->save()) {
                    return back()->with(['mensaje' => 'Venta Registrada con Exito', 'tipo' => 'success']);
                }
            } else {
                return back()->with(['mensaje' => 'No es posible realizar la venta, Cantidad de Stock Insuficiente', 'tipo' => 'danger']);
            }
        } else {
            # code...
            return back()->with(['mensaje' => 'Error! la cantidad a vender  debe ser mayor a cero', 'tipo' => 'danger']);
        }
    }
}
