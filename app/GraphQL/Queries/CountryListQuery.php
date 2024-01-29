<?php

declare(strict_types=1);

namespace App\GraphQL\Queries;

use App\Enums\CountryEnum;
use App\Models\Country;
use Illuminate\Support\Facades\Log;

use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;

use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;
use Rebing\GraphQL\Support\Facades\GraphQL;

use App\Repositories\CountryRepository;

use Closure;
use Illuminate\Support\Facades\App;

class CountryListQuery extends Query
{
    protected $attributes = [
        'name' => 'countryList',
        'description' => 'Get the List of the Countries'
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('Country'));
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
            'locale' => [
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
        $locale = $args['locale'] ?? App::getLocale();
        App::setLocale($locale);

        /** @var SelectFields $fields */
        $fields = $getSelectFields();
        $select = $fields->getSelect();
        $with = $fields->getRelations();

        return $countryRepository->search(select: $select, params: $args, with: $with);
    }
}
