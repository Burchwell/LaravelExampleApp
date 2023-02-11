<?php

namespace App\Helpers;

class Time
{
    public static function isDayTime():bool
    {
        $now = time();
        $sun = date_sun_info($now, '40.7128', '74.0060');
        return (($now >= $sun['civil_twilight_begin'] && $now < $sun['civil_twilight_end']));
    }

}
