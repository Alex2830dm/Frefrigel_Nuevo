<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller {
    
    public function index() {
        $users = User::all();
        return view('users.index')->with(['users' => $users]);
    }


    public function store(Request $request) {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique(User::class) ],
            'foto' => ['image','mimes:jpeg,png,jpg,gif,svg','max:2048']
        ]);
        //dd($request);
        if($request->hasfile('foto')){
            $foto = $request->file('foto');
            $destinationPath =('assets/imgs/users/');
            $cadena  = $foto->getClientOriginalName();
            $separacionExtencion = explode(".", $cadena);
            $filename = time() . '_' . str_replace(' ', '', $request->get('name')) . '.' . $separacionExtencion[1];
            $uploadSuccess= $request->file('foto')->move($destinationPath,$filename);
        } else {
            $filename = "foto.jpg";
        }

        User::create($request->only('name', 'p_apellido', 's_apellido', 'email', 'telefono') + [
            'password' => bcrypt($request->get('password')),
            'foto' => $filename
        ]);
        return redirect()->to('users')->with(['message' => 'Proceso Realizado Correctamente']);
    } 


    public function edit(User $user){
        return view('users.edit')->with(['user' => $user]);
    }

    public function update(Request $request, User $user) {
        //dd($request);
        if($request->hasfile('foto')){
            if ($user->foto) {
                //dd($user->foto);
                unlink("assets/imgs/users/".$user->foto);
                $foto = $request->file('foto');
                $destinationPath =('assets/imgs/users/');
                $cadena  = $foto->getClientOriginalName();
                $separacionExtencion = explode(".", $cadena);
                $filename = time() . '_' . str_replace(' ', '', $request->get('name')) . '.' . $separacionExtencion[1];
                $uploadSuccess= $request->file('foto')->move($destinationPath,$filename);
                $user->update($request->only('name', 'p_apellido', 'app', 's_apellido', 'email', 'telefono') + [
                    'foto' => $filename
                ]);
                return redirect()->to('users')->with(['message' => 'Proceso Realizado Correctamente']);
            }
        }
    }

    public function destroy(User $user){
        if ($user->foto) {
            //dd($user->foto);
            unlink("assets/imgs/users/".$user->foto);
            $user->delete();
            return redirect()->to('users')->with(['message' => 'Proceso Realizado Correctamente']);
        }
    }
}
