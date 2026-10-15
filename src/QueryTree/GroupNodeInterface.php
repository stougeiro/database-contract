<?php declare(strict_types=1);

    namespace STDW\Contract\Database\QueryTree;

    use STDW\Contract\Database\Exception\QueryTreeExceptionInterface;


    /**
     * Represents a set of nodes grouped together (parentheses).
     *
     * The group is the root of the condition expression: a single
     * ConditionNodeInterface is a leaf; a GroupNodeInterface composes leaves,
     * logic tokens and nested groups. There is no separate root node.
     *
     * Precedence of LogicNodeInterface tokens inside nodes(): evaluated
     * left-to-right; a LogicNode applies to the operand that follows it;
     * NOT negates only the next node/group; a group's default join is AND.
     *
     * Engines that cannot express a node (e.g. NoSQL filters without LIKE)
     * yield an empty result rather than an error, so a driver can be swapped
     * without touching the caller.
     */
    interface GroupNodeInterface
    {
        /** @return array<int, ConditionNodeInterface|LogicNodeInterface|GroupNodeInterface>
         */
        public function nodes(): array;
    }
