<?php declare(strict_types=1);

    namespace STDW\Contract\Database\Param\Types;


    /**
     * Storage primitives a database actually persists. Semantic variants
     * (date, datetime, json, array, decimal) are represented by the PHP value
     * itself (DateTimeInterface, array, float) — drivers infer them — so they
     * do not need their own case. Binary covers BLOB/LOB storage.
     */
    enum ParamType: string
    {
        case Null = 'null';
        case Bool = 'bool';
        case Int = 'int';
        case Float = 'float';
        case String = 'string';
        case Binary = 'binary';
    }
