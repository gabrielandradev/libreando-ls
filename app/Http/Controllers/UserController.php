<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function store(Request $request): User
    {
        $request->validate([
            'email' => ['required', 'string', 'email:rfc,dns', 'unique:Usuario'],
            'contraseña' => ['required', 'string'],
        ]);

        $user = User::create([
            'email' => $request->email,
            'contraseña' => bcrypt($request->contraseña),
            'rol' => 'estudiante'
        ]);

        return $user;
    }
}
