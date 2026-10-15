<?php declare(strict_types=1);

    namespace STDW\Contract\Database\QueryTree;

    use STDW\Contract\Database\QueryTree\Types\LogicOperator;


    /**
     * Carries a single logical operator (and/or/not).
     * It only holds the operator; grouping and children are managed
     * by GroupNodeInterface. A LogicNode applies to the node that
     * follows it; the default join of a group is AND.
     */
    interface LogicNodeInterface
    {
        /** @return LogicOperator
         */
        public function operator(): LogicOperator;
    }
