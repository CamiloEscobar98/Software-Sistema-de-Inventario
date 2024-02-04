<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use Illuminate\Support\Facades\App;

use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;

use Rebing\GraphQL\Support\Mutation;
use Rebing\GraphQL\Support\SelectFields;
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
        return GraphQL::type(CountryEnum::TypeName);
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
                'description' => "The id of the Country"
            ],
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

    /**
     * Rules for the mutation.
     * 
     * @param array $args
     * 
     * @return array
     */
    public function rules(array $args = []): array
    {
        $countryTable = CountryEnum::Table;
        $countryId = CountryEnum::Id;
        $countryName = CountryEnum::Name;
        $countrySlug = CountryEnum::Slug;

        return [
            CountryEnum::Id => ['required', 'integer', "exists:$countryTable,$countryId"],
            CountryEnum::Name => ['nullable', "string", "max:100"],
            CountryEnum::Slug => ['nullable', "string", "max:50"]
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields, CountryService $countryService)
    {
        App::setLocale($args[LanguageEnum::Locale] ?? App::getLocale());

        $fields = $getSelectFields();
        $select = $fields->getSelect();
        $with = $fields->getRelations();

        $response = $countryService->update($args);

        return $response;
    }
}
