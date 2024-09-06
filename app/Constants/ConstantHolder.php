<?php

namespace App\Constants;

class ConstantHolder
{
    protected $ALL_STATUSES;

    public static function getKey(string $status): array {
        return array_search($status, $ALL_STATUSES);
    }

    public static function getAll(): array {
        return $ALL_STATUSES;
    }
}