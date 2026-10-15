<?php declare(strict_types=1);

    namespace STDW\Contract\Database\QueryTree\Types;


    /**
     * Neutral order directions used by OrderNodeInterface.
     * Values are engine-agnostic keys; each driver maps them to its
     * native representation.
     */
    enum OrderDirection: string
    {
        case Asc = 'asc';
        case Desc = 'desc';
    }
