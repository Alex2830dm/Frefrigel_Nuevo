<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller {

    public function home() {
        $user = Auth::user();
        if($user->hasRole('Cliente')){
            return redirect()->route('pedidos.pedido');
        } elseif ( $user->hasRole('Administrador')) {
            return view('home');
        }
    }
}
