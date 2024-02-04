<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use Illuminate\Support\Facades\Log;
use Illuminate\Database\QueryException;

use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;

use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

use App\Repositories\CountryRepository;

use App\Factories\CountryFactory;

use App\Enums\CountryEnum;

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
            ]
        ];
    }

    protected function rules(array $args = []): array
    {
        $countryTable = CountryEnum::Table;
        $countrySlugColumn = CountryEnum::Slug;
        return [
            CountryEnum::Name => ['required', 'string'],
            CountryEnum::Slug => ['required']
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields, CountryRepository $countryRepository)
    {
        try {
            $country = $countryRepository->create(CountryFactory::create(null, $args[CountryEnum::Name], $args[CountryEnum::Slug]));
            return $country;
        } catch (QueryException $qe) {
            Log::error(self::class . ": {$qe->getMessage()}");
            return null;
        }
    }
}
