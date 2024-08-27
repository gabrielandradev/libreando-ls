<?php

namespace App\Constants;

class EstadoPrestamo extends ConstantHolder
{
    protected static function initValues(): array
    {
        return [
            1 => 'pendiente',
            2 => 'aprobado',
            3 => 'cancelado',
            4 => 'prestado',
            5 => 'devuelto',
            6 => 'atrasado'
        ];
    }
}