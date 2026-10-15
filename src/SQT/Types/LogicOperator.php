<?php declare(strict_types=1);

    namespace STDW\Contract\Database\SQT\Types;


    /**
     * Neutral logical operators used by LogicNodeInterface and
     * GroupNodeInterface. Values are engine-agnostic keys; each driver
     * maps them to its native representation.
     */
    enum LogicOperator: string
    {
        case And = 'and';
        case Or = 'or';
        case Not = 'not';
    }
