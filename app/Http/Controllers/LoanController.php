<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Requests\LoanRequest;
use App\Models\Loan;
use App\Models\LoanStatus;

class LoanController extends Controller
{
    public function create(): View
    {
        return view("loan.create");
    }

    public function store(LoanRequest $request): RedirectResponse
    {
        $loan = Loan::create([
            'id_libro' => $request->id_libro,
            'id_usuario' => $request->id_usuario,
            'fecha_prestamo' => null,
            'fecha_devolucion' => null,
            'id_estado_prestamo' => LoanStatus::where('estado', LoanStatus::STATUS_PENDING)->first()->id
        ]);

        return redirect(route('loan.user.show', absolute: false));
    }
}