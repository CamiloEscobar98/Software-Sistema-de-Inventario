<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use Illuminate\Support\Facades\App;

use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;

use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

use App\Services\CountryService;

use App\Enums\CountryEnum;
use App\Enums\LanguageEnum;
use Closure;

class CountryCreateMutation extends Mutation
{
    protected $attributes = [
        'name' => 'countryCreate',
        'description' => 'Mutation for create a new Country'
    ];

    public function type(): Type
    {
        return GraphQL::type(CountryEnum::GRAPHQL_TYPE_NAME);
    }

    /**
     * Args for the mutation.
     * 
     * @return array
     */
    public function args(): array
    {
        return [
            CountryEnum::NAME => [
                'type' => Type::string(),
                'description' => 'Please, type the Country`s name, stringly format.'
            ],
            CountryEnum::SLUG => [
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
        return [
            CountryEnum::NAME => ['required', "string", "max:100"],
            CountryEnum::SLUG => ['required', "string", "max:50"]
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields, CountryService $countryService)
    {
        App::setLocale($args[LanguageEnum::Locale] ?? App::getLocale());

        return $countryService->create($args);
    }
}
