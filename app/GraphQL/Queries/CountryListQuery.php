<?php

declare(strict_types=1);

namespace App\GraphQL\Queries;

use App\Repositories\CountryRepository;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;

use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;
use Rebing\GraphQL\Support\Facades\GraphQL;

use Closure;
use Illuminate\Support\Facades\Log;

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
        return [];
    }

    public function resolve(
        $root,
        array $args,
        $context,
        ResolveInfo $resolveInfo,
        Closure $getSelectFields,
        CountryRepository $countryRepository
    ) {
        /** @var SelectFields $fields */
        $fields = $getSelectFields();
        $select = $fields->getSelect();
        $with = $fields->getRelations();

        Log::info($select);
        Log::info($with);

        return $countryRepository->all();
    }
}
