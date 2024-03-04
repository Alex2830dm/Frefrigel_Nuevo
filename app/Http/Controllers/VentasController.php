<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productos;
use App\Models\Clientes;
use App\Models\Ventas;
use App\Models\Detalles_Ventas;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;
use App\Models\Categorias_Productos;
use Barryvdh\DomPDF\Facade\PDF;

class VentasController extends Controller {

    /* ----------- Procesos de Ventas ----------- */
    public function indexVentas() {
        abort_if(Gate::denies('ventas.index'), 403);
        $ventas = Ventas::join('clientes', 'ventas.id_cliente', '=', 'clientes.id')
                    ->select('ventas.id AS folio', 'clientes.nameClient as cliente', 'ventas.total_venta', 'ventas.created_at as fecha')
                    ->get();
        return view('ventas.index')->with('ventas', $ventas);
    }

    public function showVenta($venta){
        abort_if(Gate::denies('ventas.show'), 403);
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
                    'productos.priceProduct', 'detalles_ventas.importe_venta', 'detalles_ventas.entregado')                    
                    ->where('ventas.id', '=', $venta)
                    ->get();
        //return response()->json(['venta' => $ventas, 'detalles_venta' => $detalles_venta,]);
        return view('ventas.detalles')->with([
            'venta' => $ventas,
            'detalles_venta' => $detalles_venta,
        ]);
        
    }

    public function ventas() {
        abort_if(Gate::denies('ventas.venta'), 403);
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
        abort_if(Gate::denies('ventas.store'), 403);
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
            'proceso' => 'venta',
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

    /* ----------- Procesos de Pedidos ----------- */

    public function indexPedidos() {
        abort_if(Gate::denies('pedidos.index'), 403);
        $pedidos = Ventas::join('clientes', 'ventas.id_cliente', '=', 'clientes.id')
                    ->select('ventas.id AS folio', 'clientes.nameClient as cliente', 'ventas.id_cliente', 'ventas.total_venta', 'ventas.fecha_entrega')
                    ->where('ventas.proceso', '=', '2')->get();
        return view('pedidos.index')->with('pedidos', $pedidos);
    }

    public function pedidos() {
        abort_if(Gate::denies('pedidos.pedido'), 403);
        $productos = Productos::orderBy('id_categoria')->get();
        $clientes = Clientes::all();
        $folio = \DB::select('SELECT MAX(id) as folio FROM ventas');
        $categorias = Categorias_Productos::all();
        return view('pedidos.pedido2')
            ->with([
                'categorias' => $categorias,
                'productos' => $productos,
                'clientes' => $clientes,
                'folio' => $folio
            ]);
    }

    public function storePedido(Request $request){
        abort_if(Gate::denies('pedidos.store'), 403);
        //dd($request);
        $fechaEntrega = Carbon::now();
        $fechaEntrega->addDay();

        $venta = Ventas::create([
            'id_cliente'    => $request->get('id_cliente'),
            'fecha_entrega' => $fechaEntrega,
            'proceso'  => '2',
        ]);

        $idProducto = $request->get('id_productoPedido');
        $cantProducto = $request->get('cantidad_ProductoPedido');
        $i = 0;
        
        for ($i = 0; $i < count($idProducto); $i++) {
            if($cantProducto[$i] != 0) {
                $detalle_venta = Detalles_Ventas::create([
                    'folio_venta' => $request->get('folio_pedido'),
                    'id_producto' => $idProducto[$i],
                    'cantidad_venta' => $cantProducto[$i],
                ]);
            }
        }
        return redirect()->route('pedidos.show', $request->get('folio_pedido'));
    }

    public function showPedido($venta){
        abort_if(Gate::denies('pedidos.show'), 403);
        $ventas = Ventas::join('clientes', 'ventas.id_cliente', '=', 'clientes.id')
            ->select('clientes.nameClient', 'clientes.rsCliente', 'clientes.contactClient', 'clientes.jobcontactClient', 'clientes.phonecontactClient', 
                    'clientes.addressStreet', 'clientes.addressColony', 'clientes.addressMunicipality', 'clientes.addressState', 'clientes.addressCP', 'clientes.imageClient',
                    'ventas.id AS folio', 'ventas.created_at', 'ventas.total_venta')
            ->where('ventas.id', '=', $venta)->get();
        $detalles_venta  = Ventas::join('detalles_ventas', 'ventas.id', '=', 'detalles_ventas.folio_venta')
                    ->join('productos', 'detalles_ventas.id_producto', '=', 'productos.id')
                    ->select('detalles_ventas.id as iddetalle', 'detalles_ventas.id_producto', 'productos.descriptionProduct as descripcion', 'productos.unitProduct', 'detalles_ventas.cantidad_venta',
                    'productos.priceProduct', 'detalles_ventas.importe_venta')                    
                    ->where('ventas.id', '=', $venta)
                    ->get();
        //return response()->json(['venta' => $ventas, 'detalles_venta' => $detalles_venta,]);
        return view('pedidos.detalles')->with([
            'venta' => $ventas,
            'detalles_venta' => $detalles_venta,
        ]);
        
    }

    public function comprobantePedido($venta){
        abort_if(Gate::denies('pedidos.show'), 403);
        $ventas = Ventas::join('clientes', 'ventas.id_cliente', '=', 'clientes.id')
            ->select('clientes.nameClient', 'clientes.rsCliente', 'clientes.contactClient', 'clientes.jobcontactClient', 'clientes.phonecontactClient', 
                    'clientes.addressStreet', 'clientes.addressColony', 'clientes.addressMunicipality', 'clientes.addressState', 'clientes.addressCP', 'clientes.imageClient',
                    'ventas.id AS folio', 'ventas.created_at', 'ventas.total_venta')
            ->where('ventas.id', '=', $venta)->get();
        $detalles_venta  = Ventas::join('detalles_ventas', 'ventas.id', '=', 'detalles_ventas.folio_venta')
                    ->join('productos', 'detalles_ventas.id_producto', '=', 'productos.id')
                    ->select('detalles_ventas.id as iddetalle', 'detalles_ventas.id_producto', 'productos.descriptionProduct as descripcion', 'productos.unitProduct', 'detalles_ventas.cantidad_venta',
                    'productos.priceProduct', 'detalles_ventas.importe_venta')                    
                    ->where('ventas.id', '=', $venta)
                    ->get();
        //return view('pedidos.detalles')->with(['venta' => $ventas,'detalles_venta' => $detalles_venta,]);
        $pdf = PDF::loadview('pedidos/comprobante', compact('ventas','detalles_venta'));
        return $pdf->stream('comprobantePedido.pdf');
        //return redirect()->route('pedidos.index');
    }

}
