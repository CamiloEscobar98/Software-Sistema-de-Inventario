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

if (!function_exists('seedersHasTimer')) {
    /**
     * Verify if seeders has timers
     */
    function seedersHasTimer(): bool
    {
        return config('app.seeders_has_timer');
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

if (!function_exists('getSelectColumnsByTable')) {
    /**
     * @param array $fields
     * @param string $table
     * 
     * @return array
     */
    function getSelectColumnsByTable($fields, $table): array
    {
        $aux = [];

        foreach ($fields as $field) {
            $aux[] = sprintf('%s.%s', $table, $field);
        }
        return $aux;
    }
}
