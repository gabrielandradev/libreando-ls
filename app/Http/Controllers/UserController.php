<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\View\View;

class UserController extends Controller
{
    public function create(): View
    {
        return view("user.create");
    }

    public function store(Request $request): User
    {
        $request->validate([
            'email' => ['required', 'string', 'email:rfc', 'dns', 'unique:Usuario'],
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
