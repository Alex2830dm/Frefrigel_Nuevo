<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productos;
use Illuminate\Support\Facades\Gate;

class ProductsController extends Controller{
    
    public function index(){
        abort_if(Gate::denies('productos.index'), 403);
        $products = Productos::where('activo', '1')->get();
        return view('products.index')->with(['products' => $products]);
    }

    public function create(){
        abort_if(Gate::denies('productos.create'), 403);
        return view('products.create');
    }

    public function store(Request $request){
        abort_if(Gate::denies('productos.store'), 403);
        //dd($request);
        $request->validate([
            'nameProduct' => ['required', 'string'],
            'descriptionProduct' => ['required', 'string'],
            'unitProduct' => ['required', 'string'],
            'priceProduct' => ['required', 'string']
        ]);
        if($request->hasfile('imageProduct')) {
            $foto = $request->file('imageProduct');
            $destinationPath =('assets/imgs/products/');
            $cadena  = $foto->getClientOriginalName();
            $separacionExtencion = explode(".", $cadena);
            $filename = time() . '_' . str_replace(' ', '', $request->get('nameProduct')) . '.' . $separacionExtencion[1];
            $uploadSuccess= $request->file('imageProduct')->move($destinationPath,$filename);
        } else {
            $filename = 'fotoProducto.jpg';
        }
        Productos::create($request->only('nameProduct', 'descriptionProduct', 'unitProduct', 'priceProduct') + [
            'foto' => $filename
        ]);
        return redirect()->route('products.index')->with('message', 'Proceso realizado correctamente');
    }

    public function edit(Productos $producto){
        abort_if(Gate::denies('productos.edit'), 403);
        //dd($producto->activo);
        if($producto->activo == 0) {
            return redirect()->route('productos.inactives');
        } else {
            return view('products.edit')->with(['producto' => $producto]);
        }
    }

    public function update(Request $request, Productos $product){
        abort_if(Gate::denies('productos.update'), 403);
        //dd($request);
        $request->validate([
            'nameProduct' => ['required', 'string'],
            'descriptionProduct' => ['required', 'string'],
            'unitProduct' => ['required', 'string'],
            'priceProduct' => ['required', 'string']
        ]);
        if($request->hasfile('imageProduct')) {
            if ($product->foto != 'fotoProducto.jpg') {
                unlink("assets/imgs/products/".$product->foto);
            }
            $foto = $request->file('imageProduct');
            $destinationPath =('assets/imgs/products/');
            $cadena  = $foto->getClientOriginalName();
            $separacionExtencion = explode(".", $cadena);
            $filename = time() . '_' . str_replace(' ', '', $request->get('nameProduct')) . '.' . $separacionExtencion[1];
            $uploadSuccess= $request->file('imageProduct')->move($destinationPath,$filename);
        } else {
            $filename = $product->foto;
        }
        $product->update($request->only('nameProduct', 'descriptionProduct', 'unitProduct', 'priceProduct') + [
            'foto' => $filename
        ]);
        return redirect()->route('products.index')->with('message', 'Proceso realizado correctamente');
    }

    public function inactive(Productos $producto){
        abort_if(Gate::denies('productos.inactive'), 403);
        $producto->update(['activo' => 0]);
        return redirect()->route('productos.index');
    }

    public function inactives(){
        abort_if(Gate::denies('productos.inactives'), 403);
        $products = Productos::where('activo', '0')->get();
        return view('products.inactive')->with(['products' => $products]);
    }

    public function active(Productos $producto){
        abort_if(Gate::denies('productos.active'), 403);
        $producto->update(['activo' => 1]);
        return redirect()->route('productos.index');
    }

    public function destroy(Productos $producto){
        abort_if(Gate::denies('productos.destroy'), 403);
        if ($producto->foto != 'fotoProducto.jpg') {
            //dd($product->foto);
            unlink("assets/imgs/products/".$producto->foto);
        }
        $producto->delete();
        return redirect()->route('productos.index');
    }
}
