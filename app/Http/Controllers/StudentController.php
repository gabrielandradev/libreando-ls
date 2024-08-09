<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Validator;
use App\Models\User;
use App\Models\Student;

class StudentController extends Controller
{
    public function create(): View
    {
        return view("student.create");
    }

    public function store(Request $request): RedirectResponse
    {
        //Token para validación de solicitud
        $token = $request->session()->token();

        $token = csrf_token();

        // Validacion de form
        $validate = $request->validate([
            'nombre' => 'required|string|alpha:asciibetween:4,16',
            'apellido' => 'required|string|alpha:ascii|between:4,16',
            'dni' => 'required|integer|numeric|digits:8',
            'email' => 'required|string|email:rfc,dns', //(exists:user,mail)Pendiente del "Exists" https://laravel.com/docs/11.x/validation#specifying-a-custom-column-name
            'contraseña' => 'required|string',
            'telefono' => 'required|integer|numeric|digits:10',
            'año' => 'required|string',
            'division' => 'required|string',
            'especialidad' => 'required|string',
            'turno' => 'required|string',
            'domicilio' => 'required|string', //Hay ke ver
            //confirmed for passwoord? https://laravel.com/docs/11.x/validation#rule-confirmed
            // enums https://laravel.com/docs/11.x/validation#rule-enum
            //
        ]);

        /*
        *
        *Hacer una página bonita para el error 419 que arroja laravel al ver que el token no es el mismop
        */

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

        // Redireccion a la pagina previa al inicio de sesion
        return redirect('/');
    }
}
