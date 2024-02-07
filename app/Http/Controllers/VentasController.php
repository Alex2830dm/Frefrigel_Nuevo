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


    /* ----------- Procesos de Preventas ----------- */
    public function indexPreventas() {
        abort_if(Gate::denies('preventas.index'), 403);
        $preventas = Ventas::join('clientes', 'ventas.id_cliente', '=', 'clientes.id')
                    ->select('ventas.id AS folio', 'clientes.nameClient as cliente', 'ventas.total_venta', 'ventas.fecha_entrega')
                    ->where('ventas.proceso', '=', 'preventa')->get();
        return view('preventas.index')->with('preventas', $preventas);
    }

    public function preventa() {
        abort_if(Gate::denies('preventas.preventa'), 403);
        $productos = Productos::all();
        $clientes = Clientes::all();
        $folio = \DB::select('SELECT MAX(id) as folio FROM ventas');
        return view('preventas.preventas')
            ->with([
                'productos' => $productos,
                'clientes' => $clientes,
                'folio' => $folio
            ]);
    }

    public function storePreventa(Request $request) {
        abort_if(Gate::denies('preventas.store'), 403);
        //dd($request);
        $request->validate([
            'id_encargado' => ['required'],
            'folio' => ['required'],
            'fecha_entrega' => ['required'],
            'id_cliente' => ['required'],
            'total_venta' => ['required']
        ]);
        $fecha = Carbon::now('America/Mexico_City')->format('Y-m-d');
        
        $venta = Ventas::create([
            'id_encargado'  => $request->get('id_encargado'), 
            'id_cliente'    => $request->get('id_cliente'), 
            'total_venta'   => $request->get('total_venta'),
            'fecha_entrega' => $request->get('fecha_entrega'),
            'proceso'  => 'preventa',
        ]);

        $idProducto = $request->get('id_producto');
        $cantProducto = $request->get('cantidad');
        $impProducto = $request->get('importe');
        $i = 0;
        
        while($i < count($idProducto)) {
            //$descuentoStock = Productos::find($idProducto[$i])->decrement('cantidad', $cantProducto[$i]);
            $detalle_venta = Detalles_Ventas::create([
                'folio_venta' => $request->get('folio'),
                'id_producto' => $idProducto[$i],
                'cantidad_venta' => $cantProducto[$i],
                'importe_venta' => $impProducto[$i]
            ]);
            $i++;
        }

        //return redirect()->route('ventas.show', $request->get('folio'));
        return redirect()->route('preventas.index');
    }

    public function showPreventa($venta){
        abort_if(Gate::denies('preventas.show'), 403);
        $ventas = Ventas::join('clientes', 'ventas.id_cliente', '=', 'clientes.id')
            ->join('users', 'ventas.id_encargado', '=', 'users.id')
            ->select('clientes.nameClient', 'clientes.rsCliente', 'clientes.contactClient', 'clientes.jobcontactClient', 'clientes.phonecontactClient', 
                    'clientes.addressStreet', 'clientes.addressColony', 'clientes.addressMunicipality', 'clientes.addressState', 'clientes.addressCP', 'clientes.imageClient',
                    'users.name', 'users.p_apellido', 'users.s_apellido',
                    'ventas.id AS folio', 'ventas.created_at', 'ventas.total_venta')
            ->where('ventas.id', '=', $venta)->get();
        $detalles_venta  = Ventas::join('detalles_ventas', 'ventas.id', '=', 'detalles_ventas.folio_venta')
                    ->join('productos', 'detalles_ventas.id_producto', '=', 'productos.id')
                    ->select('detalles_ventas.id as iddetalle', 'detalles_ventas.id_producto', 'productos.descriptionProduct as descripcion', 'productos.unitProduct', 'detalles_ventas.cantidad_venta',
                    'productos.priceProduct', 'detalles_ventas.importe_venta')                    
                    ->where('ventas.id', '=', $venta)
                    ->get();
        //return response()->json(['venta' => $ventas, 'detalles_venta' => $detalles_venta,]);
        return view('preventas.detalles')->with([
            'venta' => $ventas,
            'detalles_venta' => $detalles_venta,
        ]);
        
    }

    public function entregaPreventa(Request $request) {
        abort_if(Gate::denies('preventas.entrega'), 403);
        //dd($request);
        $idDetalle = $request->get('id_detalle');
        $idProducto = $request->get('id_producto');
        $entregaProducto = $request->get('entregado');
        $cantProducto = $request->get('cantidad_entrega');
        $impProducto = $request->get('importe_entrega');
        $i = 0;
        
        $venta = Ventas::find($request->get('folio_venta'));
        $venta->proceso = 'venta';
        while($i < count($idDetalle)) {
            if($entregaProducto[$i] == 1) {
                $cambioStatus = Detalles_Ventas::find($idDetalle[$i]);
                $descuentoStock = Productos::find($idProducto[$i])->decrement('cantidad', $cantProducto[$i]);
                $cambioStatus->entregado = 1;
                $cambioStatus->update();
            } else {
                $venta->total_venta = $venta->total_venta - $impProducto[$i];
            }
            $i++;
        }
        $venta->update();

        //return response()->json('Exito');
        return redirect()->route('ventas.show', $request->get('folio_venta'))->with(['estatus' => 'Total Venta']);
    }
}
