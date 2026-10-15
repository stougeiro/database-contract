<?php declare(strict_types=1);

    namespace STDW\Contract\Database\Resource;


    /**
     * Represents a named resource (table/collection) in the database.
     */
    interface DatabaseResourceInterface
    {
        /** @return string 
         */
        public function name(): string;
    }
