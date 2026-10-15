<?php declare(strict_types=1);

    namespace STDW\Contract\Database\QueryTree;


    /**
     * Represents a set of nodes grouped together (parentheses).
     */
    interface GroupNodeInterface
    {
        /** @return array<int, ConditionNodeInterface|LogicNodeInterface|GroupNodeInterface>
         */
        public function nodes(): array;
    }
