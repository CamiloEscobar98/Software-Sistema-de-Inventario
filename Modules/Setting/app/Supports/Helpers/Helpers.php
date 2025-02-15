<?php

use Carbon\Carbon;
use Illuminate\Support\Str;

if (!function_exists('isProductionEnv')) {
    /**
     * Verify if project is in production.
     */
    function isProductionEnv(): bool
    {
        return config('app.env') == 'production';
    }
}

if (!function_exists('transformDatetoString')) {

    /**
     * @param string $date
     * 
     * @return string
     */
    function transformDatetoString(string $date)
    {
        $format = Carbon::parse($date);
        $day = Str::ucfirst($format->dayName) . " {$format->day} de";
        $month = Str::ucfirst($format->monthName);
        return "{$day} {$month} del {$format->year}";
    }
}

if (!function_exists('transformTimestampToString')) {

    /**
     * @param string $date
     * 
     * @return string
     */
    function transformTimestampToString(string $date)
    {
        $format = Carbon::parse($date);
        $day = Str::ucfirst($format->dayName) . " {$format->day} de";
        $month = Str::ucfirst($format->monthName);
        return "{$day} {$month} del {$format->year}, {$format->format('g:i A')}";
    }
}
