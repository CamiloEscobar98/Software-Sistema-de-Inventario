<?php

namespace App\Factories;

use App\Enums\CountryEnum;

use App\Utils\LanguageUtil;
use Illuminate\Support\Facades\Log;

class CountryFactory
{
    public static function create(...$args): array
    {
        [
            $id,
            $names,
        ] = $args;

        $names = !is_array($names) ? json_decode($names, true) : $names;

        Log::info($names);

        return [
            CountryEnum::Id => $id,
            CountryEnum::Name => LanguageUtil::transformTranslatedData($names),
        ];
    }
}
