<?php declare(strict_types=1);

    namespace STDW\Contract\Database\SQT\Types;


    /**
     * Logical operators for LogicNodeInterface and GroupNodeInterface.
     */
    enum LogicOperator: string
    {
        case And = 'AND';
        case Or = 'OR';
        case Not = 'NOT';
    }
