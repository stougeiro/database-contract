<?php declare(strict_types=1);

    namespace STDW\Contract\Database\SQT;

    use STDW\Contract\Database\Param\ParamInterface;
    use STDW\Contract\Database\SQT\Types\ConditionOperator;


    /**
     * Represents a column comparison: column + operator + typed value.
     */
    interface ConditionNodeInterface
    {
        /** @return string 
         */
        public function column(): string;

        /** @return ConditionOperator 
         */
        public function operator(): ConditionOperator;

        /** @return ParamInterface 
         */
        public function value(): ParamInterface;
    }
