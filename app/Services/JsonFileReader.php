<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

use Exception;

class JsonFileReader
{
    /**
     * 
     * @param string $filepath
     * @return array|null
     */
    public static function readFile($filepath)
    {
        ini_set('memory_limit', '256M');

        try {
            if (Storage::disk('public')->exists($filepath)) {
                $jsonContent = Storage::disk('public')->get($filepath);
                Log::info($jsonContent);
                $data = json_decode($jsonContent, true);
                Log::info($data);
                return $data;
            }
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return null;
        }
    }
}
