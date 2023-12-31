<?php declare(strict_types=1);

namespace Vendon\Core;
class Session
{
    public static function has($key): bool
    {
        return (bool)static::get($key);
    }

    public static function put($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public static function get($key, $default = null)
    {
        return $_SESSION['_flash'][$key] ?? $_SESSION[$key] ?? $default;
    }

    public static function flash($key, $value)
    {
        $_SESSION['_flash'][$key] = $value;
    }

    public static function unflash($key)
    {
        unset($_SESSION[$key]);
    }

    public static function unsetErrors()
    {
        unset($_SESSION['errors']);
    }

    public static function destroy()
    {
        $_SESSION = [];
        session_destroy();
    }
}