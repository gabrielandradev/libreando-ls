<?php

namespace App\Constants;

class Turno extends ConstantHolder
{
    protected static function initValues(): array
    {
        return [
            1 => 'mañana',
            2 => 'tarde'
        ];
    }
}