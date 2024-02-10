<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;

class LoggerService
{
    /**
     * @param string $class
     * @param string $message
     * @param array $context
     * 
     * @return void
     */
    public static function INSERT_LOG_ERROR($class, $message, $context = []): void
    {
        Log::error("$class: $message", $context);
    }

    /**
     * @param string $class
     * @param string $message
     * @param array $context
     * 
     * @return void
     */
    public static function INSERT_LOG_INFO($class, $message, $context = []): void
    {
        Log::info("$class: $message", $context);
    }
}
