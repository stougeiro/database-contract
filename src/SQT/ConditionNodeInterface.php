<?php declare(strict_types=1);

    namespace STDW\Contract\Database\SQT;

    use STDW\Contract\Database\SQT\Types\ConditionOperator;


    /**
     * Represents a column comparison.
     */
    interface ConditionNodeInterface
    {
        /** @return string 
         */
        public function column(): string;

        /** @return ConditionOperator 
         */
        public function operator(): ConditionOperator;

        /** @return mixed 
         */
        public function value(): mixed;
    }
