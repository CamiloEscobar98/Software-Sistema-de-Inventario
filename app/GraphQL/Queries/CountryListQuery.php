<?php

declare(strict_types=1);

namespace App\GraphQL\Queries;

use Illuminate\Support\Facades\App;

use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;

use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;
use Rebing\GraphQL\Support\Facades\GraphQL;

use App\Repositories\CountryRepository;

use App\Enums\CountryEnum;
use App\Enums\LanguageEnum;

use Closure;

class CountryListQuery extends Query
{
    protected $attributes = [
        'name' => 'countryList',
        'description' => 'Get the List of the Countries'
    ];

    public function type(): Type
    {
        return GraphQL::type(CountryEnum::TypePaginatedName);
    }

    public function args(): array
    {
        return [
            CountryEnum::Name => [
                'type' => Type::string(),
            ],
            CountryEnum::Slug => [
                'type' => Type::string(),
            ],
            LanguageEnum::Locale => [
                'type' => Type::string(),
            ]
        ];
    }

    public function resolve(
        $root,
        array $args,
        $context,
        ResolveInfo $resolveInfo,
        Closure $getSelectFields,
        CountryRepository $countryRepository,
    ) {
        App::setLocale($args[LanguageEnum::Locale] ?? App::getLocale());

        /** @var SelectFields $fields */
        $fields = $getSelectFields();
        $select = $fields->getSelect();
        $with = $fields->getRelations();

        $data = $countryRepository->search(select: $select, params: $args, with: $with);
    }
}
