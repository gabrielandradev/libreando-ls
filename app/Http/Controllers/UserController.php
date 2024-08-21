<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function store(Request $request): User
    {
        $request->validate([
            'email' => ['required', 'string', 'email:rfc,dns', 'unique:Usuario'],
            'contraseña' => ['required', 'string', Password::defaults()],
        ]);

        $user = User::create([
            'email' => $request->email,
            'contraseña' => $request->contraseña,
            'rol' => $request->rol
        ]);

        return $user;
    }
}
