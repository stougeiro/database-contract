<?php declare(strict_types=1);

    namespace STDW\Contract\Database\QueryTree;

    use STDW\Contract\Database\Param\ParamInterface;
    use STDW\Contract\Database\QueryTree\Node\GroupNodeInterface;
    use STDW\Contract\Database\QueryTree\Node\OrderNodeInterface;
    use STDW\Contract\Database\QueryTree\Node\PaginationNodeInterface;
    use STDW\Contract\Database\Exception\QueryTreeExceptionInterface;


    /**
     * Builds the neutral query tree from a declarative array DSL.
     *
     * The DSL is the caller-facing surface; it lowers to the node interfaces
     * in Node\. Drivers never see the arrays, only the nodes.
     *
     * filter() accepts either:
     * - a Predicate: map of "column OP" => value (entries ANDed);
     * - a list of Clauses: Predicate nodes, the tokens "AND"/"OR"/"NOT",
     *   and nested lists as groups (parentheses).
     * The key is "column OP" (space-separated; OP defaults to EQ). The
     * operator vocabulary follows ConditionOperator (case-insensitive).
     * Disambiguation uses array_is_list(), so repeating "column OP" never
     * collides.
     *
     * order() accepts either:
     * - a map of column => direction ("asc"|"desc"); or
     * - a list of "column", "column asc" or "column desc" strings.
     *
     * pagination() accepts any of limit, offset, page, perPage and cursor;
     * page/perPage are derived into limit/offset by the built node.
     *
     * @phpstan-type CriteriaValue ParamInterface|array<int, ParamInterface>|null
     * @phpstan-type Predicate array<string, CriteriaValue>
     * @phpstan-type Clause Predicate|'AND'|'OR'|'NOT'|array<int, Predicate|'AND'|'OR'|'NOT'|array<int, mixed>>
     * @phpstan-type Filter Predicate|array<int, Clause>
     * @phpstan-type Order array<int, string>|array<string, string>
     * @phpstan-type Pagination array{limit?: int, offset?: int, page?: int, perPage?: int, cursor?: mixed}
     */
    interface QueryTreeBuilderInterface
    {
        /**
         * @param Filter $filters
         * @return GroupNodeInterface
         * @throws QueryTreeExceptionInterface
         */
        public static function filter(array $filters): GroupNodeInterface;

        /**
         * @param Order $order
         * @return array<int, OrderNodeInterface>
         * @throws QueryTreeExceptionInterface
         */
        public static function order(array $order): array;

        /**
         * @param Pagination $pagination
         * @return PaginationNodeInterface
         * @throws QueryTreeExceptionInterface
         */
        public static function pagination(array $pagination): PaginationNodeInterface;
    }
