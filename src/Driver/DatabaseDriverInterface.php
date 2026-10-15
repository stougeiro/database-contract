<?php declare(strict_types=1);

    namespace STDW\Contract\Database\Driver;

    use STDW\Contract\Database\Param\ParamInterface;
    use STDW\Contract\Database\Resource\DatabaseResourceInterface;
    use STDW\Contract\Database\Result\ResultInterface;
    use STDW\Contract\Database\QueryTree\Types\OrderDirection;


    /**
     * Core CRUD contract every driver must implement.
     * Criteria are passed as simple arrays whose values are a
     * ParamInterface (typed, injection-safe) or a list of them; the
     * driver translates them to its native format (SQL, Mongo query,
     * REST params, etc.). Operators are UPPERCASE neutral keys derived
     * from ConditionOperator (each driver maps them to native). The
     * filter's string key is "column OP" (space-separated, default
     * OP = EQ). A filter is either a Predicate (associative; entries
     * ANDed) or a list of Clauses (default AND; "AND"/"OR"/"NOT"
     * tokens; nested lists are groups). Disambiguation uses
     * array_is_list(), so repeating a "column OP" never collides.
     * The aliases are non-recursive (PHPStan cannot resolve recursive
     * type aliases), so groups are typed for two levels and deeper
     * levels degrade to array<int, mixed>.
     *
     * @phpstan-type CriteriaValue ParamInterface|array<int, ParamInterface>|null
     * @phpstan-type Predicate array<string, CriteriaValue>
     * @phpstan-type Clause Predicate|'AND'|'OR'|'NOT'|array<int, Predicate|'AND'|'OR'|'NOT'|array<int, mixed>>
     * @phpstan-type Filter Predicate|array<int, Clause>
     * @phpstan-type Pagination array{limit?: int, offset?: int, page?: int, perPage?: int, cursor?: mixed}
     */
    interface DatabaseDriverInterface
    {
        /**
         * @param DatabaseResourceInterface $resource
         * @param array<string, ParamInterface> $data
         * @return ResultInterface
         */
        public function create(DatabaseResourceInterface $resource, array $data): ResultInterface;

        /**
         * @param DatabaseResourceInterface $resource
         * @param Filter $filter
         * @return ResultInterface
         */
        public function read(DatabaseResourceInterface $resource, array $filter = []): ResultInterface;

        /**
         * @param DatabaseResourceInterface $resource
         * @param Filter $filter
         * @param array<string, OrderDirection> $order
         * @param Pagination $pagination
         * @return ResultInterface
         */
        public function list(DatabaseResourceInterface $resource, array $filter = [], array $order = [], array $pagination = []): ResultInterface;

        /**
         * @param DatabaseResourceInterface $resource
         * @param array<string, ParamInterface> $data
         * @param Filter $filter
         * @return ResultInterface
         */
        public function update(DatabaseResourceInterface $resource, array $data, array $filter): ResultInterface;

        /**
         * @param DatabaseResourceInterface $resource
         * @param Filter $filter
         * @return ResultInterface
         */
        public function delete(DatabaseResourceInterface $resource, array $filter): ResultInterface;

        /**
         * @param DatabaseResourceInterface $resource
         * @param Filter $filter
         * @return ResultInterface
         */
        public function total(DatabaseResourceInterface $resource, array $filter = []): ResultInterface;

        /** @return DriverCapabilitiesInterface 
         */
        public function capabilities(): DriverCapabilitiesInterface;
    }
