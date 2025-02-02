<?php

namespace App\Factories;

use Illuminate\Support\Facades\Log;

use App\Utils\LanguageUtil;

use App\Enums\CityEnum;

class CityFactory
{
    public static function create(...$args): array
    {
        [
            $id,
            $departmentId,
            $names,
        ] = $args;

        $names = !is_array($names) ? json_decode($names, true) : $names;

        Log::info($names);

        return [
            CityEnum::ID => $id,
            CityEnum::DEPARTMENT_ID => $departmentId,
            CityEnum::NAME => LanguageUtil::transformTranslatedData($names),
        ];
    }
}
