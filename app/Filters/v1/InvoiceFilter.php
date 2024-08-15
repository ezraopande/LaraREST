<?php

namespace App\Filters\v1;

use Illuminate\Http\Request;
use App\Filters\ApiFilter;

class InvoiceFilter extends ApiFilter
{
    protected $allowedParams = [
        'customerId' => ['eq'],
        'status' => ['eq', 'ne'],
        'paidDate' => ['eq', 'gt', 'gte', 'lt', 'lte'],
        'billedDate' => ['eq', 'gt', 'gte', 'lt', 'lte'],
        'amount' => ['eq', 'gt', 'gte', 'lt', 'lte'],
    ];

    protected $columnMap = [
        'billedDate' => 'billed_date',
        'paidDate' => 'paid_date',
        'customerId' => 'customer_id',
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