<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleados;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Validation\Rule;

class EmpleadosController extends Controller
{
    public function index() {
        $users = User::all()->load('roles');
        $empleados = Empleados::where('activo', '=', '1')->get();
        return view('empleados.index')->with(['empleados' => $empleados, 'users' => $users]);
    }

    public function create(){
        $roles = Role::all();
        return view('empleados.create')->with(['roles' => $roles]);
    }

    public function store(Request $request) {
        //dd($request);
        //abort_if(Gate::denies('users.store'), 403);
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'p_apellido' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique(User::class) ],
            'telefono' => ['required', 'string', 'max:15'],
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
            $filename = "fotoFefrigel.jpg";
        }
        $roles = $request->input('roles');
        $folio = Empleados::max('id');
        //dd($folio);
        $empleado = Empleados::create($request->only('name', 'p_apellido', 's_apellido', 'telefono') + [
            'foto' => $filename
        ]);
        $user = User::create($request->only('name', 'username', 'email') + [
            'password' => bcrypt($request->get('password')),
            'tipo_usuario' => '1',
            'id_identificacion' => $folio + 1, 
        ]);
        $user->syncRoles($roles);
        return redirect()->route('empleados.index')->with(['message' => 'Proceso Realizado Correctamente']);
    } 

    public function edit(Empleados $empleado) {
        return view('empleados.edit')->with(['empleado' => $empleado]);
    }

    public function update(Request $request, Empleados $empleado) {
        //dd($request);
        if($request->hasfile('foto')){
            if ($empleado->foto) {
                //dd($user->foto);
                unlink("assets/imgs/users/".$user->foto);
            }
            $foto = $request->file('foto');
            $destinationPath =('assets/imgs/users/');
            $cadena  = $foto->getClientOriginalName();
            $separacionExtencion = explode(".", $cadena);
            $filename = time() . '_' . str_replace(' ', '', $request->get('name')) . '.' . $separacionExtencion[1];
            $uploadSuccess= $request->file('foto')->move($destinationPath,$filename);
        } else {
            $filename = "fotoFefrigel.jpg";
        }
        $empleado->update($request->only('name', 'p_apellido', 's_apellido', 'telefono') + [
            'foto' => $filename
        ]);
        return redirect()->route('empleados.index');
    }

    public function destroy(Request $request, User $user){
        //abort_if(Gate::denies('users.delete'), 403);
        if (auth()->user()->id == $user->id) {
            return redirect()->route('users.index');
        } else {
            $empleado = Empleados::findOrFail($request->get('id_empleado'));
            $empleado->activo = 0;
            $empleado->update();
            return redirect()->route('empleados.index');
        }
    }
}
