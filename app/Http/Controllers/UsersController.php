<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Gate;

class UsersController extends Controller {
    
    public function index() {
        abort_if(Gate::denies('users.index'), 403);
        $users = User::all()->load('roles');
        //return response()->json($users);
        return view('users.index')->with(['users' => $users]);
    }

    public function create() {
        abort_if(Gate::denies('users.create'), 403);
        $roles = Role::all();
        return view('auth.register')->with(['roles' => $roles]);
    }


    public function store(Request $request) {
        //dd($request);
        abort_if(Gate::denies('users.store'), 403);
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'p_apellido' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique(User::class) ],
            'telefono' => ['required', 'string', 'max:15'],
            'foto' => ['image','mimes:jpeg,png,jpg,gif,svg','max:2048'],
            'username' => ['required', 'string']
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
        $roles = $request->input('roles');
        $user = User::create($request->only('name', 'username', 'p_apellido', 's_apellido', 'email', 'telefono') + [
            'password' => bcrypt($request->get('password')),
            'foto' => $filename
        ]);
        $user->syncRoles($roles);
        return redirect()->to('users')->with(['message' => 'Proceso Realizado Correctamente']);
    } 


    public function edit(User $user){
        abort_if(Gate::denies('users.edit'), 403);
        $user->load('roles');
        $roles = Role::all();
        return view('users.edit')->with(['user' => $user, 'roles' => $roles]);
    }

    public function update(Request $request, User $user) {
        abort_if(Gate::denies('users.update'), 403);
        //dd($request);
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'p_apellido' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'telefono' => ['required', 'string', 'max:15'],
            'username' => ['required', 'string']
        ]);
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
                $roles = $request->input('roles');
                $user->update($request->only('name', 'p_apellido', 'app', 's_apellido', 'email', 'telefono') + [
                    'foto' => $filename
                ]);
                $user->syncRoles($roles);
                return redirect()->to('users')->with(['message' => 'Proceso Realizado Correctamente']);
            }
        } else {
            $roles = $request->input('roles');
            $user->update($request->only('name', 'p_apellido', 'app', 's_apellido', 'email', 'telefono'));
            $user->syncRoles($roles);
            return redirect()->to('users')->with(['message' => 'Proceso Realizado Correctamente']);
        }
    }

    public function destroy(User $user){
        abort_if(Gate::denies('users.delete'), 403);
        if (auth()->user()->id == $user->id) {
            return redirect()->route('users.index');
        } else {
            if ($user->foto) {
                //dd($user->foto);
                unlink("assets/imgs/users/".$user->foto);
                $user->delete();
                return redirect()->to('users')->with(['message' => 'Proceso Realizado Correctamente']);
            }
        }
    }
}
