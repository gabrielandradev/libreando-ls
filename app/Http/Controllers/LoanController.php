<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Requests\LoanRequest;
use App\Models\Loan;
use Illuminate\Support\Facades\DB;

class LoanController extends Controller
{
    public function create(): View
    {
        return view("loan.create");
    }

    public function store(LoanRequest $request): RedirectResponse
    {
        $estado_pendiente = DB::table('Estado_Prestamo')->where('estado', 'Pendiente')->value('id');

        $loan = Loan::create([
            'id_libro' => $request->id_libro,
            'id_usuario' => $request->id_usuario,
            'fecha_prestamo' => null,
            'fecha_devolucion' => null,
            'id_estado_prestamo' => $estado_pendiente
        ]);

        return redirect(route('loan.user.show', absolute: false));
    }
}