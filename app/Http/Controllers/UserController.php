<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function store(Request $request): User
    {
        $request->validate([
            'email' => ['required', 'string', 'email:rfc,dns', 'unique:Usuario'],
            'contraseña' => ['required', 'string', Password::defaults()],
        ]);

        $id_rol = DB::table('Rol')->where('nombre', $request->rol)->value('id');

        $cuenta_pendiente = $id_rol = DB::table('Estado_Cuenta')->where('estado', 'Pendiente')->value('id');

        $user = User::create([
            'email' => $request->email,
            'contraseña' => $request->contraseña,
            'id_rol' => $id_rol,
            'id_estado_cuenta' => $cuenta_pendiente
        ]);

        return $user;
    }
}
