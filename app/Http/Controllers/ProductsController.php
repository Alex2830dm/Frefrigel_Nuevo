<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productos;

class ProductsController extends Controller{
    
    public function index(){
        $products = Productos::where('activo', '1')->get();
        return view('products.index')->with(['products' => $products]);
    }

    public function create(){
        return view('products.create');
    }

    public function store(Request $request){
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

    public function edit(Productos $product){
        //dd($product);
        if($product->activo == 0) {
            return redirect()->route('products.inactives');
        } else {
            return view('products.edit')->with(['product' => $product]);
        }
    }

    public function update(Request $request, Productos $product){
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

    public function inactive(Productos $product){
        $product->update(['activo' => 0]);
        return redirect()->route('products.index');
    }

    public function inactives(){
        $products = Productos::where('activo', '0')->get();
        return view('products.inactive')->with(['products' => $products]);
    }

    public function active(Productos $product){
        $product->update(['activo' => 1]);
        return redirect()->route('products.index');
    }

    public function destroy(Productos $product){
        if ($product->foto != 'fotoProducto.jpg') {
            //dd($product->foto);
            unlink("assets/imgs/products/".$product->foto);
        }
        $product->delete();
        return redirect()->route('products.index');
    }
}
