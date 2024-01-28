<?php

declare(strict_types=1);

return [
    'countries' => [
        'ask' => "How many Countries would you like to create? \nBy default, five Countries will be created.",
        'item' => "\n-Creating country [:index]: :name",
        'finish' => ":total Countries have been registered"
    ],
    'departments' => [
        'ask' => "How many Departments would you like to create? \nBy default, five Departments will be created.",
        'item' => "\n-Creating Department [:index]: :name",
        'finish' => ":total Departments have been registered"
    ],
    'cities' => [
        'ask' => "How many Cities would you like to create? \nBy default, five Cities will be created.",
        'item' => "\n-Creating City [:index]: :name",
        'finish' => ":total Cities have been registered"
    ],
    'genders' => [
        'ask' => "How many Genders would you like to create? \nBy default, five Genders will be created.",
        'item' => "\n-Creating Gender [:index]: :name",
        'finish' => ":total Genders have been registered"
    ],
    'document_types' => [
        'ask' => "How many Document Types would you like to create? \nBy default, five Document Types will be created.",
        'item' => "\n-Creating Document Type [:index]: :name",
        'finish' => ":total Document Types have been registered"
    ],
    'civil_statuses' => [
        'ask' => "How many Civil Statuses would you like to create? \nBy default, five Civil Statuses will be created.",
        'item' => "\n-Creating Document Type [:index]: :name",
        'finish' => ":total Civil Statuses have been registered"
    ],
    'tenants' => [
        'ask' => "How many Tenants would you like to create? \nBy default, five Tenants will be created.",
        'item' => "\n-Creating Tenant [:index]: :name",
        'finish' => ":total Tenants have been registered"
    ],
    'users' => [
        'ask' => "How many Users would you like to create? \nBy default, five Users will be created.",
        'item' => "\n-Creating User [:index]: :username",
        'finish' => ":total Users have been registered"
    ],
    'user_document' => [
        'item' => "\n-Creating User Document [:name]: :document, with document type: :document_type",
    ],
    'user_personal_information' => [
        'item' => "\n-Creating User Information [:username]: Full name: :name, email: :email",
    ],
];
