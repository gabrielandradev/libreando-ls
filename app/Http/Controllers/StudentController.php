<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Student;

class StudentController extends Controller
{
    public function create(): View
    {
        return view("auth.student.create");
    }

    public function store(Request $request): RedirectResponse
    {
        $userRequestContent = new Request
        ([
                'email' => $request->email,
                'contraseña' => $request->contraseña,
                'rol' => 'estudiante'
            ]);

        $userController = new UserController();

        $request->validate([
            'nombre' => ['required', 'string', 'alpha:ascii'],
            'apellido' => ['required', 'string', 'alpha:ascii'],
            'dni' => ['required', 'integer', 'numeric', 'digits:8', 'unique:Estudiante'],
            'telefono' => ['required', 'integer', 'numeric', 'digits:10'],
            'año' => ['required', 'string'],
            'division' => ['required', 'string'],
            'especialidad' => ['required', 'string'],
            'turno' => ['required', 'string'],
            'domicilio' => ['required', 'string']
        ]);

        $user = $userController->store($userRequestContent);

        Student::create([
            'dni' => $request->dni,
            'id_usuario' => $user->id,
            'apellido' => $request->apellido,
            'nombre' => $request->nombre,
            'año' => $request->año,
            'division' => $request->division,
            'turno' => $request->turno,
            'especialidad' => $request->especialidad,
            'domicilio' => $request->domicilio,
            'telefono' => $request->telefono,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
