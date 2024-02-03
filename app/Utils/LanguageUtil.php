<?php

namespace App\Utils;

use App\Enums\LanguageEnum;

/**
 * Class LanguageUtil
 * @package App\Utils
 * @author Andrés Yáñez <andres.escobar.aplicasoftware@gmail.com>
 * 
 * @method array transformTranslatedData
 */
class LanguageUtil
{
    public static function transformTranslatedData(array $values): array
    {
        $temp = [];

        foreach (LanguageEnum::LANG_AVAILABLES as $item) {
            if (isset($values[$item]) && $values[$item]) {
                $temp[$item] = $values[$item];
            } else {
                $temp[$item] = $values[LanguageEnum::LANG_ES];
            }
        }

        return $temp;
    }
}
