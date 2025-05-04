<?php

namespace App\Core;

class Config
{
    /**
     * Get an environment variable by key with an optional default value.
     *
     * @param string $key
     * @param mixed|null $default
     * @return mixed
     */
    public static function get(string $key, mixed $default = null): mixed
    {
        if (isset($_ENV[$key])) {
            return $_ENV[$key];
        }

        if ($value = getenv($key)) {
            return $value;
        }

        return $default;
    }

    /**
     * Get a boolean env variable (like for flags)
     */
    public static function getBool(string $key, bool $default = false): bool
    {
        return filter_var(self::get($key, $default), FILTER_VALIDATE_BOOLEAN);
    }
}