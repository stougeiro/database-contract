<?php declare(strict_types=1);

    namespace STDW\Contract\Database\SQT;

    use STDW\Contract\Database\SQT\Types\LogicOperator;


    /**
     * Carries a single logical operator (and/or/not).
     * It only holds the operator; grouping and children are managed
     * by GroupNodeInterface.
     */
    interface LogicNodeInterface
    {
        /** @return LogicOperator 
         */
        public function operator(): LogicOperator;
    }
