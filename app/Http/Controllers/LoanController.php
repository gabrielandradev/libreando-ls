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
            ->orderBy('id', 'desc')
            ->simplePaginate(10);

        return view('loan.admin.pending', ['loans' => $pending_loans]);
    }

    public function userLoans(): View
    {
        $user_loans = Loan::where('id_usuario', Auth::user()->id)
            ->simplePaginate(10);

        return view('profile.loans', ['loans' => $user_loans]);
    }

    public function active(): View
    {
        $active_loans = Loan::query()
            ->has('onLoan')
            ->orderBy('id', 'desc')
            ->simplePaginate(10);

        return view('loan.admin.active', ['loans' => $active_loans]);
    }

    public function showLoanActivator(Loan $loan): View
    {
        return view('loan.activate', [
            'loan' => $loan,
            'date_now' => Carbon::now()->format('Y-m-d')
        ]);
    }

    public function loan(LoanRequest $request): RedirectResponse
    {
        if ($request->loan()->book->availability->estado != BookAvailability::STATUS_AVAILABLE) {
            abort(403, 'Unauthorized action.');
        }

        $request->loan()->fecha_prestamo = $request->fecha_prestamo;
        $request->loan()->fecha_devolucion = $request->fecha_devolucion;
        $request->loan()->id_estado_prestamo = LoanStatus::where(
            'estado',
            LoanStatus::STATUS_ON_LOAN
        )->first()->id;

        $request->loan()->book->id_disponibilidad = BookAvailability::where(
            'estado',
            BookAvailability::STATUS_ON_LOAN
        )->first()->id;

        $request->loan()->save();
        $request->loan()->book->save();

        return redirect()->intended(route('admin.prestamos.activos', absolute: false));
    }
}