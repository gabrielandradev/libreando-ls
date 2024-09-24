<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
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
use Illuminate\Support\Facades\Redirect;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Response;

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

    public function store(Book $book): View
    {
        // TODO: (!$book->isAvailable())
        if ($book->availability->estado != BookAvailability::STATUS_AVAILABLE) {
            abort(403, 'Unauthorized action.');
        }

        $loan = Loan::create([
            'id_libro' => $book->id,
            'id_usuario' => Auth::user()->id,
            'fecha_solicitud' => Carbon::now()->format('Y-m-d'),
            'fecha_prestamo' => null,
            'fecha_devolucion' => null,
            'id_estado_prestamo' => LoanStatus::where(
                'estado',
                LoanStatus::STATUS_PENDING
            )
                ->first()->id
        ]);

        return view('loan.show', ['loan' => $loan]);
    }

    public function toPDF(Loan $loan): Response
    {
        $pdf = Pdf::loadView(
            'loan.pdf',
            ['loan' => $loan]
        );

        return $pdf->download("libreando-solicitud-prestamo-" . $loan->fecha_solicitud . "-" . $loan->id . ".pdf");
    }

    public function pending(): View
    {
        $pending_loans = Loan::query()
            ->has('pending')
            ->simplePaginate(10);

        return view('loan.admin.pending', ['loans' => $pending_loans]);
    }

    public function userLoans(): View
    {
        $user_loans = Loan::where('id_usuario', Auth::user()->id)
            ->simplePaginate(10);

        return view('profile.loans', ['loans' => $user_loans]);
    }
}