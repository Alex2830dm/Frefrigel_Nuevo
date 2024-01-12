<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productos;
use App\Models\Clientes;
use App\Models\Ventas;

class VentasController extends Controller {

    public function ventas() {
        $productos = Productos::all();
        $clientes = Clientes::all();
        $folio = \DB::select('SELECT MAX(id) as folio FROM ventas');
        return view('ventas.ventas')
            ->with([
                'productos' => $productos,
                'clientes' => $clientes,
                'folio' => $folio
            ]);
    }

    public function storeVenta(Request $request) {
        //dd($request);
        $request->validate([
            'id_encargado' => ['required'],
            'folio' => ['required'],
            'id_cliente' => ['required'],
            'total_venta' => ['required']
        ]);
        dd($request);
    }
}
