<?php

namespace App\Helpers;

use App\Meta\Constants;

class Allowable
{
    /**
     * Link submissions are restricted to the official work week (Monday - Friday).
     *
     * @param string $date
     *
     * @return bool
     */
    public static function weekend($date)
    {
        return in_array($date, Constants::WEEKEND) ? true : false;
    }
}
