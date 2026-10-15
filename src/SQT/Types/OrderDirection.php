<?php declare(strict_types=1);

    namespace STDW\Contract\Database\SQT\Types;


    /**
     * Logical operators for LogicNodeInterface and GroupNodeInterface.
     */
    enum OrderDirection: string
    {
        case Asc = 'ASC';
        case Desc = 'DESC';
    }
