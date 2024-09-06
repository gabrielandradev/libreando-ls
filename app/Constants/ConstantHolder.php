<?php

namespace App\Constants;

abstract class ConstantHolder
{
    private static $values = [];

    abstract protected static function initValues(): array;

    protected static function getValues(): array
    {
        self::$values = static::initValues();
        return self::$values;
    }

    public static function getAll(): array {
        return static::getValues();
    }

    public static function getOnlyValues(): array
    {
        return array_values(static::getValues());
    }

    public static function get(string $key): ?string
    {
        $values = static::getValues();
        return $values[$key] ?? null;
    }

    public static function getKey(string $value): ?string
    {
        $values = static::getValues();
        return array_search(strtolower($value), $values);
    }

    public static function push(string $value): int
    {
        $assigned_id = count(static::getValues());
        self::$values[$assigned_id] = $value;
        return $assigned_id;
    }
}