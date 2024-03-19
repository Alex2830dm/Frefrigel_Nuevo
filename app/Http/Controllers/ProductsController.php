<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productos;
use Illuminate\Support\Facades\Gate;
use App\Models\Categorias_Productos;

class ProductsController extends Controller{
    
    public function index(){
        abort_if(Gate::denies('productos.index'), 403);
        $products = Productos::where('activo', '1')->get();
        return view('products.index')->with(['products' => $products]);
    }

    public function create(){
        abort_if(Gate::denies('productos.create'), 403);
        //$categorias = Categorias_Productos::all();
        return view('products.create');
    }

    public function select_categorias(Request $request){
        $tipo_producto = $request->get('tipo_producto');
        $categorias = Categorias_Productos::where('tipo_producto', '=', $tipo_producto)->get();
        return view('products.select_categorias')->with(['categorias' => $categorias]);
    }

    public function store(Request $request){
        abort_if(Gate::denies('productos.store'), 403);
        //dd($request);
        $request->validate([
            'nameProduct' => ['required', 'string'],
            'descriptionProduct' => ['required', 'string'],
            'unitProduct' => ['required', 'string'],
            'cantidadUnit' => ['required'],
            'priceProduct' => ['required', 'string'],
            'tipo_producto' => ['required',],
            'id_categoria' => ['required']
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
        Productos::create($request->only('codeProduct', 'nameProduct', 'descriptionProduct', 'unitProduct', 'cantidadUnit',
                            'priceProduct', 'tipo_producto', 'id_categoria') + [
            'foto' => $filename
        ]);
        return redirect()->route('productos.index')->with('message', 'Proceso realizado correctamente');
    }

    public function edit(Productos $producto){
        abort_if(Gate::denies('productos.edit'), 403);
        //dd($producto->activo);
        if($producto->activo == 0) {
            return redirect()->route('productos.inactives');
        } else {
            $categorias = Categorias_Productos::all();
            return view('products.edit')->with(['producto' => $producto, 'categorias' => $categorias]);
        }
    }

    public function update(Request $request, Productos $producto){
        abort_if(Gate::denies('productos.update'), 403);
        //dd($request);
        $request->validate([
            'nameProduct' => ['required', 'string'],
            'descriptionProduct' => ['required', 'string'],
            'unitProduct' => ['required', 'string'],
            'priceProduct' => ['required', 'string']
        ]);
        if($request->hasfile('imageProduct')) {
            if ($producto->foto != 'fotoProducto.jpg') {
                unlink("assets/imgs/products/".$producto->foto);
            }
            $foto = $request->file('imageProduct');
            $destinationPath =('assets/imgs/products/');
            $cadena  = $foto->getClientOriginalName();
            $separacionExtencion = explode(".", $cadena);
            $filename = time() . '_' . str_replace(' ', '', $request->get('nameProduct')) . '.' . $separacionExtencion[1];
            $uploadSuccess= $request->file('imageProduct')->move($destinationPath,$filename);
        } else {
            $filename = $producto->foto;
        }
        $producto->update($request->only('nameProduct', 'descriptionProduct', 'unitProduct', 'priceProduct', 'id_categoria') + [
            'foto' => $filename
        ]);
        return redirect()->route('productos.index')->with('message', 'Proceso realizado correctamente');
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

    /* ----------- Procesos de Categorias ----------- */

    public function indexCategorias() {
        $categorias = Categorias_Productos::all();
        return view('products.categorias.index')
            ->with(['categorias' => $categorias]);
    }

    public function createCategorias() {
        return view('products.categorias.create');
    }

    public function storeCategorias(Request $request) {
        //dd($request);
        Categorias_Productos::create($request->all());
        return redirect()->route('categorias.index');
    }

    public function editCategorias(Categorias_Productos $categoria) {
        return view('products.categorias.edit')->with(['categoria' => $categoria]);
    }

    public function updateCategorias(Request $request, Categorias_Productos $categoria) {
        //dd($request);
        $categoria->update(['categoria' => $request->get('categoria')]);
        return redirect()->route('categorias.index');
    }

    public function deleteCategorias(Categorias_Productos $categoria){
        //dd($categoria);
        $categoria->delete();
        return redirect()->route('categorias.index');
    }
}
