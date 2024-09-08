<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Teacher;
use App\Models\Role;
use Illuminate\Support\Facades\Validator;

class TeacherController extends Controller
{
    public function create(): View
    {
        return view("auth.teacher.create");
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate(['email' => ['regex:/(.*)bue\.edu\.ar$/i']]);

        $userRequestContent = new Request([
            'email' => $request->email,
            'contraseña' => $request->contraseña,
            'rol' => Role::ROLE_TEACHER
        ]);

        $userController = new UserController();

        $validated = $request->validate([
            'nombre' => ['required', 'string', 'alpha:ascii'],
            'apellido' => ['required', 'string', 'alpha:ascii'],
            'dni' => ['required', 'integer', 'numeric', 'digits:8', 'unique:Estudiante'],
            'telefono' => ['required', 'numeric', 'digits:10'],
            'especialidad' => ['required', 'string'],
            'domicilio' => ['required', 'string']
        ]);

        $user = $userController->store($userRequestContent);

        $teacher = Teacher::create([
            'dni' => $request->dni,
            'id_usuario' => $user->id,
            'apellido' => $request->apellido,
            'nombre' => $request->nombre,
            'especialidad' => $request->especialidad,
            'domicilio' => $request->domicilio,
            'telefono' => $request->telefono,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
