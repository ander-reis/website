<?php

use Carbon\Carbon;

if (!function_exists('dateFormattedDatabase')) {
    function dateFormattedDatabase($date)
    {
        return Carbon::createFromFormat('d-m-Y', str_replace('/', '-', $date))->format('Y-m-d');
    }
}
