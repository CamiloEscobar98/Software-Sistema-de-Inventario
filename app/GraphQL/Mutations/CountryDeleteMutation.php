<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Enums\CountryEnum;
use App\Services\CountryService;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use Rebing\GraphQL\Support\SelectFields;

class CountryDeleteMutation extends Mutation
{
    protected $attributes = [
        'name' => 'countryDelete',
        'description' => 'Mutation for delete a Country'
    ];

    public function type(): Type
    {
        return Type::boolean();
    }

    /**
     * Args for the mutation.
     * 
     * @return array
     */
    public function args(): array
    {
        return [
            CountryEnum::Id => [
                'type' => Type::int(),
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
            CountryEnum::Id => ['required', 'integer', sprintf("exists:%s,%s", CountryEnum::Table, CountryEnum::Id)]
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields, CountryService $countryService)
    {
        $fields = $getSelectFields();
        $select = $fields->getSelect();
        $with = $fields->getRelations();

        $response = $countryService->delete($args[CountryEnum::Id]);

        return $response;
    }
}
