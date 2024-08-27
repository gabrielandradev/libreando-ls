<?php

namespace App\Constants;

class Rol extends ConstantHolder
{
    protected static function initValues(): array
    {
        return [
            1 => 'estudiante',
            2 => 'profesor',
            3 => 'administrador'
        ];
    }
}