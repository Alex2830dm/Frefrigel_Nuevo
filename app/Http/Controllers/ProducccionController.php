<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ventas;
use App\Models\Detalles_Ventas;
use Carbon\Carbon;


class ProducccionController extends Controller
{
    
    public function produccion() {
        $fechaProduccion = Carbon::now('America/Mexico_City')->addDay()->format('Y-m-d');
        $produccionPedidos = Detalles_Ventas::join('productos', 'detalles_ventas.id_producto', '=', 'productos.id')
            ->join('ventas', 'detalles_ventas.folio_venta', '=', 'ventas.id')
            ->select('detalles_ventas.id_producto', 'productos.nameProduct', 'productos.unitProduct', 'productos.descriptionProduct', 'productos.foto',
                \DB::raw('SUM(detalles_ventas.cantidad_venta) AS cantidad_total'))
            ->where('ventas.fecha_entrega', '=', $fechaProduccion)
            ->groupBy('detalles_ventas.id_producto')
            ->get();

        //return response()->json(['produccion' => $produccionPedidos]);
        return view('produccion.producciones')->with(['produccion' => $produccionPedidos]);
    }
}
