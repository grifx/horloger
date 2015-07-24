<?php

namespace Horloger;

/**
 * @author Joris Garonian <joris.garonian@gmail.com>
 */
class ProxyAutoloader
{
    public static function register()
    {
        return spl_autoload_register(
            function ($className) {
                if ($className === 'Horloger\DateTime') {
                    require 'Proxy/DateTime.php';
                }

                if ($className === 'Horloger\DateTimeImmutable') {
                    require 'Proxy/DateTimeImmutable.php';
                }
            },
            true,
            true
        );
    }
}
