<?php

namespace Horloger;

use DateTimeZone;

/**
 * @author Joris Garonian <joris.garonian@gmail.com>
 * @deprecated This is a Proxy Class used in a test environment.
 */
class DateTime extends \DateTime
{
    public function __construct($time = 'now', DateTimeZone $timezone = null)
    {
        if ($time === 'now') {
            $time = PredefinedTime::find(get_called_class()) ?: 'now';
        }

        parent::__construct($time, $timezone);
    }
}
