<?php

namespace App\Constants;

class DisponibilidadLibro
{
    public const DISPONIBILIDAD_DISPONIBLE = "disponible";
    public const DISPONIBILIDAD_PRESTADO = "prestado";
    public const DISPONIBILIDAD_BLOQUEADO = "bloqueado";
    public const DISPONIBILIDAD_SUSPENDIDO = "suspendido";

    private const ALL_STATUSES = [
        self::DISPONIBILIDAD_DISPONIBLE,
        self::DISPONIBILIDAD_PRESTADO,
        self::DISPONIBILIDAD_BLOQUEADO,
        self::DISPONIBILIDAD_SUSPENDIDO
    ];
}