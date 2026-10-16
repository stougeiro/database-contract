<?php declare(strict_types=1);

    namespace STDW\Contract\Database\Aggregation\Type;


    /**
     * Neutral aggregation functions used by AggregateInterface.
     * Values are engine-agnostic keys; each driver maps them to its
     * native representation (SQL functions, MongoDB accumulators, etc.).
     */
    enum AggregateFunction: string
    {
        case Count = 'count';
        case Sum = 'sum';
        case Avg = 'avg';
        case Min = 'min';
        case Max = 'max';
    }
