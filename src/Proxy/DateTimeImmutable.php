<?php

namespace Horloger\Proxy;

use DateTimeZone;
use Horloger\PredefinedTime;

/**
 * @author Joris Garonian <joris.garonian@gmail.com>
 * @deprecated This is a Proxy Class used in a test environment.
 */
class DateTimeImmutable extends \DateTimeImmutable
{
    public function __construct($time = 'now', DateTimeZone $timezone = null)
    {
        if ($time === 'now') {
            $time = PredefinedTime::find(get_called_class()) ?: 'now';
        }

        parent::__construct($time, $timezone);
    }
}
