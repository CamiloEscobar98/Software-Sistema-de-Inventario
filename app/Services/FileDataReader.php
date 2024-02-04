<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

use Exception;

class FileDataReader
{
    /**
     * 
     * @param string $filepath
     * @return array|null
     */
    public static function readFileFromJson($filepath): array
    {
        ini_set('memory_limit', '256M');

        try {
            if (Storage::disk('public')->exists($filepath)) {
                $jsonContent = Storage::disk('public')->get($filepath);
                $data = json_decode($jsonContent, true);
                Log::info($data);
                return $data ?? [];
            }
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return null;
        }
    }

    public static function readFileFromCsv($filepath): array
    {
        $response = [];
        try {
            if (Storage::disk('public')->exists($filepath)) {
                $fullPath = Storage::disk('public')->path($filepath);
                if (($handle = fopen($fullPath, 'r')) !== false) {
                    // Lee la primera fila para los encabezados
                    $headers = fgetcsv($handle);
                    while (($row = fgetcsv($handle)) !== false) {
                        $rowData = [];
                        foreach ($row as $key => $value) {
                            // Asume que $headers está alineado con $row
                            $index = $headers[$key] ?? $key;
                            $rowData[$index] = is_numeric($value) ? (int)$value : $value;
                        }
                        $response[] = $rowData;
                    }
                    fclose($handle);
                }
                return $response;
            }
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return [];
        }

        return []; // Retorna un arreglo vacío si el archivo no existe o hay un error
    }
}
