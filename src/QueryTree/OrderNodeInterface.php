<?php declare(strict_types=1);

    namespace STDW\Contract\Database\QueryTree;

    use STDW\Contract\Database\QueryTree\Types\OrderDirection;


    /**
     * Represents an ORDER BY clause.
     */
    interface OrderNodeInterface
    {
        /** @return string 
         */
        public function column(): string;

        /** @return OrderDirection 
         */
        public function direction(): OrderDirection;
    }
