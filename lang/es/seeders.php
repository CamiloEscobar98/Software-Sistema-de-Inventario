<?php

declare(strict_types=1);

return [
    'countries' => [
        'ask' => "¿Cuántos Países desea crear? \nPor defecto se crearán cinco Paises.",
        'item' => "\n-Creando el País [:index]: :name.",
        'finish' => "\nSe han registrado :total paises"
    ],
    'departments' => [
        'ask' => "¿Cuántos Departamentos desea crear? \nPor defecto se crearán cinco Departamentos.",
        'item' => "\n-Creando el Departamento [:index]: :name.",
        'finish' => "\nSe han registrado :total Departamentos"
    ],
    'cities' => [
        'ask' => "¿Cuántas Ciudades desea crear? \nPor defecto se crearán cinco Ciudades.",
        'item' => "\n-Creando la Ciudad [:index]: :name.",
        'finish' => "\nSe han registrado :total Ciudades"
    ],
    'genders' => [
        'ask' => "¿Cuántos Géneros desea crear? \nPor defecto se crearán cinco Géneros.",
        'item' => "\n-Creando el Género [:index]: :name.",
        'finish' => "\nSe han registrado :total Géneros"
    ],
    'document_types' => [
        'ask' => "¿Cuántos Tipos de Documentos desea crear? \nPor defecto se crearán cinco Tipos de Documentos.",
        'item' => "\n-Creando el Tipo de Documento [:index]: :name.",
        'finish' => "\nSe han registrado :total Tipos de Documentos"
    ],
    'civil_statuses' => [
        'ask' => "¿Cuántos Estados Civiles desea crear? \nPor defecto se crearán cinco Estados Civiles.",
        'item' => "\n-Creando el Estado Civil [:index]: :name.",
        'finish' => "\nSe han registrado :total Estados Civiles"
    ],
    'tenants' => [
        'ask' => "¿Cuántos Clientes desea crear? \nPor defecto se crearán cinco Clientes.",
        'item' => "\n-Creando el Cliente [:index]: :name.",
        'finish' => "\nSe han registrado :total Clientes"
    ],
    'users' => [
        'ask' => "¿Cuántos Usuarios desea crear? \nPor defecto se crearán cinco Usuarios.",
        'item' => "\n-Creando el Usuario [:index]: con Nickname :username.",
        'finish' => "\nSe han registrado :total Usuarios"
    ],
    'user_document' => [
        'item' => "\n-Creando el Documento para el Usuario [:name]: :document, con tipo de documento: :document_type",
    ],
    'user_personal_information' => [
        'item' => "\n-Creando la Información del Usuario [:username]: Nombre completo: :name, correo electrónico: :email",
    ],
];
