<?php declare(strict_types=1);

    namespace STDW\Contract\Database\Param;


    enum ParamType: string
    {
        case Int = 'int';
        case Float = 'float';
        case String = 'string';
        case Bool = 'bool';
        case Null = 'null';
        case Array = 'array';
        case Json = 'json';
        case Date = 'date';
        case Datetime = 'datetime';
    }
