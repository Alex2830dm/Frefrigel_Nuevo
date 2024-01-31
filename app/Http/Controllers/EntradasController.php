<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productos;
use App\Models\Clientes;
use App\Models\Ventas as Entradas;
use App\Models\Detalles_Ventas as Detalles_Entradas;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;

class EntradasController extends Controller {
    
    public function index() {
        abort_if(Gate::denies('entradas.index'), 403);
        $entradas = Entradas::join('users', 'ventas.id_encargado', '=', 'users.id')
                    ->select('ventas.id AS folio', 'users.name', 'users.p_apellido', 'users.s_apellido', 'ventas.created_at as fecha')
                    ->where('ventas.proceso', 'entrada')->get();
        return view('entradas.index')->with('entradas', $entradas);
    }

    public function show($entrada){
        abort_if(Gate::denies('entradas.show'), 403);
        //dd($entrada);
        $entradas = Entradas::join('users', 'ventas.id_encargado', '=', 'users.id')
            ->select('ventas.id AS folio', 'users.name', 'users.p_apellido', 'users.s_apellido',
                    'ventas.created_at', 'ventas.total_venta')
            ->where('ventas.id', '=', $entrada)->get();
        $detalles_entrada  = Entradas::join('detalles_ventas', 'ventas.id', '=', 'detalles_ventas.folio_venta')
                    ->join('productos', 'detalles_ventas.id_producto', '=', 'productos.id')
                    ->select('detalles_ventas.id_producto', 'productos.descriptionProduct as descripcion', 'productos.unitProduct', 'productos.cantidad', 'detalles_ventas.cantidad_venta',
                    'productos.priceProduct', 'detalles_ventas.importe_venta')                    
                    ->where('ventas.id', '=', $entrada)
                    ->get();
        //return response()->json(['entrada' => $entradas, 'detalles_venta' => $detalles_entrada,]);
        return view('entradas.detalles')->with([
            'entrada' => $entradas,
            'detalles_entrada' => $detalles_entrada,
        ]);
        
    }

    public function entradas() {
        abort_if(Gate::denies('entradas.entrada'), 403);
        $productos = Productos::all();
        $clientes = Clientes::all();
        $folio = \DB::select('SELECT MAX(id) as folio FROM ventas');
        return view('entradas.entrada')
            ->with([
                'productos' => $productos,
                'clientes' => $clientes,
                'folio' => $folio
            ]);
    }

    public function datos_producto(Request $request){
        abort_if(Gate::denies('entradas.info_producto'), 403);
        //dd($request);
        $id = $request->get('id');
        $datos = Productos::select('nameProduct', 'priceProduct', 'unitProduct')
                    ->where('productos.id', '=', $id)->get();
        return view("entradas/datos_producto")->with(['datos' => $datos]);
    }  

    public function storeEntrada(Request $request) {
        abort_if(Gate::denies('entradas.store'), 403);
        //dd($request);
        $request->validate([
            'folio' => ['required'],
        ]);
        $fecha = Carbon::now('America/Mexico_City')->format('Y-m-d');
        
        $venta = Entradas::create(['id_encargado'  => $request->get('id_encargado'), 'proceso' => 'entrada']);

        $idProducto = $request->get('id_producto');
        $cantProducto = $request->get('cantidad');
        $i = 0;
        
        while($i < count($idProducto)) {
            $aumentoStock = Productos::find($idProducto[$i])->increment('cantidad', $cantProducto[$i]);
            $detalle_entrada = Detalles_Entradas::create([
                'folio_venta' => $request->get('folio'),
                'id_producto' => $idProducto[$i],
                'cantidad_venta' => $cantProducto[$i],
            ]);
            $i++;
        }

        //return response()->json('Exito');
        return redirect()->route('entradas.show', $request->get('folio'));
    }
}
