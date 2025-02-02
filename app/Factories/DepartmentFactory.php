<?php

namespace App\Factories;

use Illuminate\Support\Facades\Log;

use App\Utils\LanguageUtil;

use App\Enums\DepartmentEnum;

class DepartmentFactory
{
    public static function create(...$args): array
    {
        [
            $id,
            $countryId,
            $names,
        ] = $args;

        $names = !is_array($names) ? json_decode($names, true) : $names;

        Log::info($names);

        return [
            DepartmentEnum::ID => $id,
            DepartmentEnum::CountryId => $countryId,
            DepartmentEnum::NAME => LanguageUtil::transformTranslatedData($names),
        ];
    }
}
