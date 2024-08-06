<?php

use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Determinar si la aplicacion esta en modo de mantenimiento
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Registrar el autoloader de Composer
require __DIR__.'/../vendor/autoload.php';

// Manejar request con Bootstrap Laravel
(require_once __DIR__.'/../bootstrap/app.php')
    ->handleRequest(Request::capture());
