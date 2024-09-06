<?php

namespace App\Constants;

class Rol
{
    public const ROL_ESTUDIANTE = "estudiante";
    public const ROL_PROFESOR = "profesor";
    public const ROL_ADMIN = "administrador";

    public const ALL_STATUSES = [
        self::ROL_ESTUDIANTE,
        self::ROL_PROFESOR,
        self::ROL_ADMIN
    ];
}