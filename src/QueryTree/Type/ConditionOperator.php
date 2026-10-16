<?php declare(strict_types=1);

    namespace STDW\Contract\Database\QueryTree\Type;


    /**
     * Neutral operators used by ConditionNodeInterface.
     * Values are engine-agnostic keys; each driver maps them to its
     * native representation (SQL symbols, Mongo operators, etc.).
     * Engine-specific operators are outside this enum and are handled
     * by the driver's own filter arrays / capabilities.
     */
    enum ConditionOperator: string
    {
        case Eq = 'eq';
        case Neq = 'neq';
        case Gt = 'gt';
        case Gte = 'gte';
        case Lt = 'lt';
        case Lte = 'lte';
        case In = 'in';
        case NotIn = 'not_in';
        case Like = 'like';
        case NotLike = 'not_like';
        case IsNull = 'is_null';
        case IsNotNull = 'is_not_null';
        case Between = 'between';
        case NotBetween = 'not_between';
    }
