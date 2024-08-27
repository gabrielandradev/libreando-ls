<?php

namespace App\Constants;
class DisponibilidadLibro extends ConstantHolder
{
    protected static function initValues(): array
    {
        return [
            1 => 'disponible',
            2 => 'prestado',
            3 => 'bloqueado'
        ];
    }
}