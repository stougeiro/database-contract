<?php declare(strict_types=1);

    namespace STDW\Contract\Database\Param;


    enum ParamType: string
    {
        case INT = 'int';
        case FLOAT = 'float';
        case STRING = 'string';
        case BOOL = 'bool';
        case NULL = 'null';
        case ARRAY = 'array';
        case JSON = 'json';
        case DATE = 'date';
        case DATETIME = 'datetime';
    }
