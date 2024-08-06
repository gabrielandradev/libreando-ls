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
        

        // En caso de error en validacion o CSRF, mostrar mensaje de error en view


        // Ingreso de datos a la BD


        // Redireccion a la pagina previa al inicio de sesion
        return redirect(/* */);
    }
}
