<?php declare(strict_types=1);

    namespace STDW\Contract\Database\QueryTree\Node;

    use STDW\Contract\Database\QueryTree\Type\LogicOperator;


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
