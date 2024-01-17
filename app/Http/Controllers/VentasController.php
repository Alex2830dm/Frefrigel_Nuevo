<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productos;
use App\Models\Clientes;
use App\Models\Ventas;
use App\Models\Detalles_Ventas;
use App\Models\User;
use Carbon\Carbon;

class VentasController extends Controller {

    public function index() {
        $ventas = Ventas::join('clientes', 'ventas.id_cliente', '=', 'clientes.id')
                    ->select('ventas.id AS folio', 'clientes.nameClient as cliente', 'ventas.total_venta', 'ventas.created_at as fecha')
                    ->get();
        return view('ventas.index')->with('ventas', $ventas);
    }

    public function show($venta){
        $ventas = Ventas::join('clientes', 'ventas.id_cliente', '=', 'clientes.id')
            ->join('users', 'ventas.id_encargado', '=', 'users.id')
            ->select('clientes.nameClient', 'clientes.rsCliente', 'clientes.contactClient', 'clientes.jobcontactClient', 'clientes.phonecontactClient', 
                    'clientes.addressStreet', 'clientes.addressColony', 'clientes.addressMunicipality', 'clientes.addressState', 'clientes.addressCP', 'clientes.imageClient',
                    'users.name', 'users.p_apellido', 'users.s_apellido',
                    'ventas.created_at', 'ventas.total_venta')
            ->where('ventas.id', '=', $venta)->get();
        $detalles_venta  = Ventas::join('detalles_ventas', 'ventas.id', '=', 'detalles_ventas.folio_venta')
                    ->join('productos', 'detalles_ventas.id_producto', '=', 'productos.id')
                    ->select('detalles_ventas.id_producto', 'productos.descriptionProduct as descripcion', 'productos.unitProduct', 'detalles_ventas.cantidad_venta',
                    'productos.priceProduct', 'detalles_ventas.importe_venta')                    
                    ->where('ventas.id', '=', $venta)
                    ->get();
        //return response()->json(['venta' => $ventas, 'detalles_venta' => $detalles_venta,]);
        return view('ventas.detalles')->with([
            'venta' => $ventas,
            'detalles_venta' => $detalles_venta,
        ]);
        
    }

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
        $fecha = Carbon::now('America/Mexico_City')->format('Y-m-d');
        
        $venta = Ventas::create([
            'id_encargado'  => $request->get('id_encargado'), 
            'id_cliente'    => $request->get('id_cliente'), 
            'total_venta'   => $request->get('total_venta'),
        ]);

        $idProducto = $request->get('id_producto');
        $cantProducto = $request->get('cantidad');
        $impProducto = $request->get('importe');
        $i = 0;
        
        while($i < count($idProducto)) {
            $descuentoStock = Productos::find($idProducto[$i])->decrement('cantidad', $cantProducto[$i]);
            $detalle_venta = Detalles_Ventas::create([
                'folio_venta' => $request->get('folio'),
                'id_producto' => $idProducto[$i],
                'cantidad_venta' => $cantProducto[$i],
                'importe_venta' => $impProducto[$i]
            ]);
            $i++;
        }

        return redirect()->route('ventas.show', $request->get('folio'));
    }
}
