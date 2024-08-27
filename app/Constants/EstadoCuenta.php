<?php

namespace App\Constants;

class EstadoCuenta extends ConstantHolder
{
    protected static function initValues(): array
    {
        return [
            1 => 'pendiente',
            2 => 'activada',
            3 => 'bloqueada'
        ];
    }
}