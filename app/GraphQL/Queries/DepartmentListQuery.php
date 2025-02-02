<?php

declare(strict_types=1);

namespace App\GraphQL\Queries;

use Illuminate\Support\Facades\App;

use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;

use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;

use App\Enums\DepartmentEnum;
use App\Enums\LanguageEnum;

use Closure;

class DepartmentListQuery extends Query
{
    protected $attributes = [
        'name' => 'departmentList',
        'description' => 'Get the List of the Departments'
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type(DepartmentEnum::GRAPHQL_TYPE_NAME));
    }

    public function args(): array
    {
        return [
            DepartmentEnum::CountryId => [
                'type' => Type::int(),
            ],
            DepartmentEnum::NAME => [
                'type' => Type::string(),
            ],
            LanguageEnum::Locale => [
                'type' => Type::string()
            ]
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        App::setLocale($args[LanguageEnum::Locale] ?? App::getLocale());

        /** @var SelectFields $fields */
        $fields = $getSelectFields();
        $select = $fields->getSelect();
        $with = $fields->getRelations();

        return [
            'The departmentList works',
        ];
    }
}
