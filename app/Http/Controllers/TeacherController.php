<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\User;
use App\Models\Teacher;

class TeacherController extends Controller
{
    public function create(): View
    {
        return view("auth.teacher.create");
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nombre' => 'required|string|alpha:asciibetween:4,16',
            'apellido' => 'required|string|alpha:ascii|between:4,16',
            'dni' => 'required|integer|numeric|digits:8|unique:estudiantes',
            'email' => 'required|string|email:rfc,dns|unique:usuarios',
            'contraseña' => 'required|string',
            'telefono' => 'required|integer|numeric|digits:10',
            'especialidad' => 'required|string',
            'domicilio' => 'required|string'
        ]);

        $user = User::create([
            'email' => $request->email,
            'contraseña' => bcrypt($request->contraseña),
            'rol' => 'profesor'
        ]);

        $teacher = Teacher::create([
            'dni' => $request->dni,
            'id_usuario' => $user->id,
            'apellido' => $request->apellido,
            'nombre' => $request->nombre,
            'especialidad' => $request->especialidad,
            'domicilio' => $request->domicilio,
            'telefono' => $request->telefono,
        ]);

        return redirect('/');
    }
}
