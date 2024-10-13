<?php

namespace App\GraphQL\Types;

use GraphQL\Type\Definition\Type;
use GraphQL\Type\Definition\ObjectType;

class UserType extends ObjectType
{
    public function __construct()
    {
        $config = [
            'name' => 'User',
            'fields' => [
                'id' => Type::nonNull(Type::int()),
                'email' => Type::string(),
            ],
        ];

        parent::__construct($config);
    }
}
