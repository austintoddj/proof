<?php

namespace App\Helpers;

class Slugify
{
    public static function generateSlug($string)
    {
        return strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $string));
    }
}
