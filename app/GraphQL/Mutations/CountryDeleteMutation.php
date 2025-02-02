<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use Illuminate\Support\Facades\App;

use Rebing\GraphQL\Support\Mutation;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\SelectFields;

use GraphQL\Type\Definition\Type;
use GraphQL\Type\Definition\ResolveInfo;

use App\Services\CountryService;

use App\Enums\CountryEnum;
use App\Enums\LanguageEnum;

use Closure;

class CountryDeleteMutation extends Mutation
{
    protected $attributes = [
        'name' => 'countryDelete',
        'description' => 'Mutation for delete a Country'
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
            ],
            LanguageEnum::Locale => [
                'type' => Type::string()
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
        return [
            CountryEnum::ID => ['required', 'integer', sprintf("exists:%s,%s", CountryEnum::TABLE, CountryEnum::ID)]
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields, CountryService $countryService)
    {
        App::setLocale($args[LanguageEnum::Locale] ?? App::getLocale());

        return $countryService->delete($args[CountryEnum::ID]);
    }
}
