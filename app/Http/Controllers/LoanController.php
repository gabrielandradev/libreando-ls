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
use App\Models\Book;
use App\Models\BookAvailability;
use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;

class LoanController extends Controller
{
    public function create(Book $book): View
    {
        // TODO: (!$book->isAvailable())
        if ($book->availability->estado != BookAvailability::STATUS_AVAILABLE) {
            return view('book.show', compact('book')); // with errors
        }

        return view("loan.create", compact('book'));
    }

    public function store(LoanRequest $request): RedirectResponse
    {
        $loan = Loan::create([
            'id_libro' => $request->id_libro,
            'id_usuario' => $request->id_usuario,
            'fecha_solicitud' => Carbon::now()->format('Y-m-d'),
            'fecha_prestamo' => null,
            'fecha_devolucion' => null,
            'id_estado_prestamo' => LoanStatus::where('estado', 
            LoanStatus::STATUS_PENDING)
            ->first()->id
        ]);

        return redirect(route('loan.user.show', absolute: false));
    }

    public function userLoans(): View {
        $user_loans = Loan::where('id_usuario', Auth::user()->id)
        ->simplePaginate(10);

        return view('profile.loans', ['loans' => $user_loans]);
    }
}