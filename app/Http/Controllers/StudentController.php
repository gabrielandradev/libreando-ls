<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Validator;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;

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
            'localidad' => 'required|string', //Hay ke ver
            //confirmed for passwoord? https://laravel.com/docs/11.x/validation#rule-confirmed
            // enums https://laravel.com/docs/11.x/validation#rule-enum
            //
        ]);

        /*
        *
        *Hacer una página bonita para el error 419 que arroja laravel al ver que el token no es el mismop
        */
        
        // Ingreso de datos a la BD
        DB::insert('insert into usuarios (email, contraseña, rol) values (?, ?, ?)', [
            $request->input('email'),
            $request->input('contraseña'),
            'estudiante'
        ]);
        DB::insert('insert into estudiantes 
        (dni, id_usuario, apellido, nombre, año, division, turno, especialidad, domicilio, celular) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [
            $request-> input('dni'),
            // $request-> input('id'),  id_usuario,
            1,
            $request-> input('apellido'),
            $request-> input('nombre'),
            $request-> input('año'),
            $request-> input('division'),
            $request-> input('turno'),
            $request-> input('especialidad'),
            $request-> input('localidad'),
            $request-> input('telefono'),
        ]);

        // Redireccion a la pagina previa al inicio de sesion
        return redirect('/');
    }
}
