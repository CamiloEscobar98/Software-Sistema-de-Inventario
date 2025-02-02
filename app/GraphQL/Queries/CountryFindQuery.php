<?php

declare(strict_types=1);

namespace App\GraphQL\Queries;

use Illuminate\Support\Facades\App;

use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;

use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;

use App\Enums\CountryEnum;
use App\Enums\LanguageEnum;
use App\Repositories\CountryRepository;
use Closure;

class CountryFindQuery extends Query
{
    protected $attributes = [
        'name' => 'countryFind',
        'description' => 'Get a Country'
    ];

    public function type(): Type
    {
        return GraphQL::type(CountryEnum::GRAPHQL_TYPE_NAME);
    }

    /**
     * Args for the query.
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
                'type' => Type::string(),
            ]
        ];
    }

    /**
     * Rules for the query.
     * 
     * @param array $args
     * 
     * @return array
     */
    public function rules(array $args = []): array
    {
        return [
            CountryEnum::ID => ['required', 'integer', sprintf("exists:%s,%s", CountryEnum::TABLE, CountryEnum::ID)],
            LanguageEnum::Locale => ['nullable', 'string', sprintf("exists:%s,%s", LanguageEnum::TABLE, LanguageEnum::SLUG)]
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields, CountryRepository $countryRepository)
    {
        App::setLocale($args[LanguageEnum::Locale] ?? App::getLocale());

        /** @var SelectFields $fields */
        $fields = $getSelectFields();
        $select = $fields->getSelect();
        $with = $fields->getRelations();

        $response = $countryRepository->find($args[CountryEnum::ID]);

        return $response;
    }
}
