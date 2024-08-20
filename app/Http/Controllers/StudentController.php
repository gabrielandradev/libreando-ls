<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\User;
use App\Models\Student;

class StudentController extends Controller
{
    public function create(): View
    {
        return view("auth.student.create");
    }

    public function store(Request $request): RedirectResponse
    {
        // Validacion de form
        $validated = $request->validate([
            'nombre' => 'required|string|alpha:ascii',
            'apellido' => 'required|string|alpha:ascii',
            'dni' => 'required|integer|numeric|digits:8|unique:estudiantes',
            'email' => 'required|string|email:rfc,dns|unique:usuarios',
            'contraseña' => 'required|string',
            'telefono' => 'required|integer|numeric|digits:10',
            'año' => 'required|string',
            'division' => 'required|string',
            'especialidad' => 'required|string',
            'turno' => 'required|string',
            'domicilio' => 'required|string'
        ]);

        $user = User::create([
            'email' => $request->input('email'),
            'contraseña' => bcrypt($request->input('contraseña')),
            'rol' => 'estudiante'
        ]);

        $student = Student::create([
            'dni' => $request->input('dni'),
            'id_usuario' => $user->id,
            'apellido' => $request->input('apellido'),
            'nombre' => $request->input('nombre'),
            'año' => $request->input('año'),
            'division' => $request->input('division'),
            'turno' => $request->input('turno'),
            'especialidad' => $request->input('especialidad'),
            'domicilio' => $request->input('domicilio'),
            'telefono' => $request->input('telefono'),
        ]);

        return redirect('/');
    }
}
