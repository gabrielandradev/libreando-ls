<?php

namespace App\Http\Requests;

use App\Models\Loan;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LoanRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'id_libro' => ['required', 'integer', 'exists:Libro'],
            'id_usuario' => ['required', 'integer', 'exists:Usuario'],
            'fecha_prestamo' => ['date'],
            'fecha_devolucion' => ['date'],
            'id_estado_prestamo' => ['required', 'integer', 'exists:Estado_Prestamo']
        ];
    }
}
