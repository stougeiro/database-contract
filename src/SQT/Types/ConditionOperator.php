<?php declare(strict_types=1);

    namespace STDW\Contract\Database\SQT\Types;


    /**
     * Operators used by ConditionNodeInterface.
     * The enum uses string constants that map to their SQL representation.
     */
    enum ConditionOperator: string
    {
        case Eq = '=';
        case Neq = '!=';
        case Gt = '>';
        case Gte = '>=';
        case Lt = '<';
        case Lte = '<=';
        case In = 'IN';
        case NotIn = 'NOT IN';
        case Like = 'LIKE';
        case NotLike = 'NOT LIKE';
        case IsNull = 'IS NULL';
        case IsNotNull = 'IS NOT NULL';
        case Between = 'BETWEEN';
        case NotBetween = 'NOT BETWEEN';
    }
