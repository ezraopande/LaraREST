<?php

namespace App\Filters\v1;

use App\Filters\ApiFilter;

class CustomerFilter extends ApiFilter
{
    protected $allowedParams = [
        'name' => ['eq'],
        'email' => ['eq'],
        'city' => ['eq'],
        'state' => ['eq'],
        'type' => ['eq', 'gt', 'gte', 'lt', 'lte'],
        'postalCode' => ['eq', 'gt', 'gte', 'lt', 'lte'],
    ];

    protected $columnMap = [
        'postalCode' => 'postal_code',
    ];

    // protected $operatorMap = [
    //     'eq' => '=',
    //     'gt' => '>',
    //     'lt' => '<',
    //     'gte' => '>=',
    //     'lte' => '<=',
    //     'ne' => '!='
    // ];
}