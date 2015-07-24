<?php

namespace Horloger;

/**
 * @author Joris Garonian <joris.garonian@gmail.com>
 */
final class PredefinedTime
{
    private static $registry = array();
    private static $stopped  = false;

    public static function find($fqcn)
    {
        if (self::$stopped || !self::has($fqcn)) {
            return null;
        }

        if (is_callable(self::$registry[$fqcn])) {
            return call_user_func(self::$registry[$fqcn], $fqcn);
        }

        return self::$registry[$fqcn];
    }

    public static function add($fqcn, $value)
    {
        self::$registry[$fqcn] = $value;
    }

    public static function remove($fqcn)
    {
        unset(self::$registry[$fqcn]);
    }

    public static function clean()
    {
        self::$registry = array();
    }

    public static function has($key)
    {
        return array_key_exists($key, self::$registry);
    }

    public static function stop()
    {
        self::$stopped = true;
    }

    public static function start()
    {
        self::$stopped = false;
    }
}
