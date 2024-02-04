<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\App;
use Illuminate\Database\QueryException;

use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;

use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

use App\Repositories\CountryRepository;

use App\Factories\CountryFactory;

use App\Enums\CountryEnum;
use App\Enums\LanguageEnum;

use Closure;

class CountryCreateMutation extends Mutation
{
    protected $attributes = [
        'name' => 'countryCreate',
        'description' => 'Mutation for Create a new Country'
    ];

    public function type(): Type
    {
        return GraphQL::type(CountryEnum::TypeName);
    }

    public function args(): array
    {
        return [
            CountryEnum::Name => [
                'type' => Type::string(),
                'description' => 'Please, type the Country`s name, stringly format.'
            ],
            CountryEnum::Slug => [
                'type' => Type::string(),
                'description' => 'Please, type the Country`s slug.'
            ],
            LanguageEnum::Locale => [
                'type' => Type::string(),
                'description' => 'Language'
            ]
        ];
    }

    protected function rules(array $args = []): array
    {
        $countryTable = CountryEnum::Table;
        $countrySlugColumn = CountryEnum::Slug;
        return [
            CountryEnum::Name => ['required', "string", "max:100"],
            CountryEnum::Slug => ['required', "string", "max:50"]
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields, CountryRepository $countryRepository)
    {
        App::setLocale($args[LanguageEnum::Locale] ?? App::getLocale());
        
        try {
            $country = $countryRepository->create(CountryFactory::create(null, $args[CountryEnum::Name], $args[CountryEnum::Slug]));
            return $country;
        } catch (QueryException $qe) {
            Log::error(self::class . ": {$qe->getMessage()}");
            return null;
        }
    }
}
