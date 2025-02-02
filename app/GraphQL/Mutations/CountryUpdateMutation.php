<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use Illuminate\Support\Facades\App;

use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;

use Rebing\GraphQL\Support\Mutation;
use Rebing\GraphQL\Support\Facades\GraphQL;

use App\Services\CountryService;

use App\Enums\CountryEnum;
use App\Enums\LanguageEnum;

use Closure;

class CountryUpdateMutation extends Mutation
{
    protected $attributes = [
        'name' => 'countryUpdate',
        'description' => 'Mutation for update a Country'
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
            CountryEnum::ID => [
                'type' => Type::int(),
                'description' => "The id of the Country"
            ],
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

    /**
     * Rules for the mutation.
     * 
     * @param array $args
     * 
     * @return array
     */
    public function rules(array $args = []): array
    {
        $countryTable = CountryEnum::TABLE;
        $countryId = CountryEnum::ID;

        return [
            CountryEnum::ID => ['required', 'integer', sprintf("exists:%s,%s", CountryEnum::TABLE, CountryEnum::ID)],
            CountryEnum::NAME => ['nullable', "string", "max:100"],
            CountryEnum::SLUG => ['nullable', "string", "max:50"]
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields, CountryService $countryService)
    {
        App::setLocale($args[LanguageEnum::Locale] ?? App::getLocale());

        return $countryService->update($args[CountryEnum::ID], $args);
    }
}
