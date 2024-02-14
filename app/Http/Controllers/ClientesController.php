<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ClientesController extends Controller {
    
    public function index() {
        abort_if(Gate::denies('clientes.index'), 403);
        $clientes = Clientes::where('activo', '1')->get();
        return view('clients.index')->with(['clientes' => $clientes]);
    }

    public function inactivos() {
        abort_if(Gate::denies('clientes.inactives'), 403);
        dd("Hola");
        $clientes = Clientes::all();
        return view('clients.inactivos')->with(['clientes' => $clientes]);
    }

    public function create() {
        abort_if(Gate::denies('clientes.create'), 403);
        return view('clients.create');
    }

    public function store(Request $request) {
        abort_if(Gate::denies('clientes.store'), 403);
        //dd($request);
        $request->validate([
            'nameClient' => ['required', 'string'],
            'contactClient' => ['required', 'string'],
            'jobcontactClient' => ['required', 'string'],
            'phonecontactClient' => ['required', 'string'],
            'emailcontactClient' => ['required', 'string'],
            'addressStreet' => ['required', 'string'],
            'addressColony' => ['required', 'string'],
            'addressMunicipality' => ['required', 'string'],
            'addressState' => ['required', 'string'],
            'addressCP' => ['required', 'string'],
            'imageClient' => ['mimes:jpg,jpeg,bmp,png'],
        ]);

        if($request->hasfile('imageClient')) {
            $foto = $request->file('imageClient');
            $destinationPath =('assets/imgs/clientes/');
            $cadena  = $foto->getClientOriginalName();
            $separacionExtencion = explode(".", $cadena);
            $filename = time() . '_' . str_replace(' ', '', $request->get('nameClient')) . '.' . $separacionExtencion[1];
            //dd($filename);
            $uploadSuccess= $request->file('imageClient')->move($destinationPath,$filename);
        } else {
            $filename = "fotoCliente.jpg";
        }

        $id_cliente = Clientes::max('id');
        //dd($id_cliente);
        Clientes::create($request->only('nameClient', 'rsCliente', 'phoneClient', 'emailClient', 'contactClient', 'jobcontactClient',
                'phonecontactClient', 'addressStreet', 'addressColony', 'addressMunicipality', 'addressState',
                'addressCP') + ['imageClient' => $filename]);
        $user = User::create([
            'name' => $request->get('contactClient'),
            'email' => $request->get('emailcontactClient'),
            'password' => "Frefrigel20224",
            'tipo_usuario' => '2',
            'id_identificacion' => $id_cliente + 1
        ]);

        $user->syncRoles('Cliente');

        return redirect()->route('clientes.index')->with(['message' => 'Proceso Completado']);
    }

    public function show(Clientes $clientes) {
        //
    }

    public function edit(Clientes $cliente) {
        abort_if(Gate::denies('clientes.edit'), 403);
        //dd($cliente);
        //return response()->json($clientes);
        return view('clients.edit')->with(['cliente' => $cliente]);
    }

    public function update(Request $request, Clientes $cliente) {
        abort_if(Gate::denies('clientes.update'), 403);
        //dd($request);
        $request->validate([
            'nameClient' => ['required', 'string'],
            'contactClient' => ['required', 'string'],
            'jobcontactClient' => ['required', 'string'],
            'phonecontactClient' => ['required', 'string'],
            'emailcontactClient' => ['required', 'string'],
            'addressStreet' => ['required', 'string'],
            'addressColony' => ['required', 'string'],
            'addressMunicipality' => ['required', 'string'],
            'addressState' => ['required', 'string'],
            'addressCP' => ['required', 'string'],
            'imageClient' => ['mimes:jpg,jpeg,bmp,png'],
        ]);

        if($request->hasfile('imageClient')) {
            if($cliente->imageClient != "fotoCliente.jpg"){
                unlink("assets/imgs/clientes/".$cliente->imageClient);
            }
            $foto = $request->file('imageClient');
            $destinationPath =('assets/imgs/clientes/');
            $cadena  = $foto->getClientOriginalName();
            $separacionExtencion = explode(".", $cadena);
            $filename = time() . '_' . str_replace(' ', '', $request->get('nameClient')) . '.' . $separacionExtencion[1];
            //dd($filename);
            $uploadSuccess= $request->file('imageClient')->move($destinationPath,$filename);
        } else {
            $filename = $cliente->imageClient;
        }

        $cliente->update($request->only('nameClient', 'rsCliente', 'phoneClient', 'emailClient', 'contactClient', 'jobcontactClient',
                'phonecontactClient', 'emailcontactClient', 'addressStreet', 'addressColony', 'addressMunicipality', 'addressState',
                'addressCP') + ['imageClient' => $filename]);

        return redirect()->route('clientes.index')->with(['message' => 'Proceso Completado']);
    }

    public function destroy(Clientes $cliente) {
        abort_if(Gate::denies('clientes.destroy'), 403);
        if($cliente->imageClient != "fotoCliente.jpg"){
            unlink("assets/imgs/clientes/".$cliente->imageClient);
        }
        $cliente->delete();
        return redirect()->route('clientes.index')->with(['message' => 'Proceso Completado']);
    }

    public function inactive(Clientes $cliente){
        //abort_if(Gate::denies('users.index'), 403);
        //dd($cliente->id);
        $cliente->update(['activo' => '0']);
        return redirect()->route('clientes.index')->with(['message' => 'Proceso Completado']);
    }
}
