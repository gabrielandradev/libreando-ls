<?php

namespace App\Constants;

class Especialidad extends ConstantHolder
{
    protected static function initValues(): array
    {
        return [
            1 => 'computacion',
            2 => 'electrica',
            3 => 'electronica',
            4 => 'quimica',
            5 => 'construcciones',
            6 => 'mecanica'
        ];
    }
}