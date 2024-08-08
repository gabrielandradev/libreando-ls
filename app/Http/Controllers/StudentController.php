<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StudentController extends Controller
{
    public function create(): View
    {
        return view("student.create");
    }

    public function store(Request $request): RedirectResponse
    {
        // Validacion de form
        $validate = $request->validate([
            'nombre' => 'required|string|alpha:ascii|between:4,16',
            'apellido'=> 'required|string|alpha:ascii|between:4,16',
            'dni'=> 'required|integer|numeric|digits:8|',
            'email'=> 'required|string|email:rfc,dns|', //(exists:user,mail)Pendiente del "Exists" https://laravel.com/docs/11.x/validation#specifying-a-custom-column-name
            'contraseña'=> 'required|string|alpha_num:ascii|between:4,28',
            'telefono'=> 'required|integer|numeric|digits:10',
            'año'=> 'required|string|',
            'division'=> 'required|string|',
            'especialidad'=> 'required|string|',
            'turno'=> 'required|string|',
            'localidad'=> 'required|string|', //Hay ke ver
            //confirmed for passwoord? https://laravel.com/docs/11.x/validation#rule-confirmed
            // enums https://laravel.com/docs/11.x/validation#rule-enum
            //
        ]);
        
        // En caso de error en validacion o CSRF, mostrar mensaje de error en view


        // Ingreso de datos a la BD


        // Redireccion a la pagina previa al inicio de sesion
        return redirect(/* */);
    }
}
