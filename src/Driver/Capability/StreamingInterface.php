<?php declare(strict_types=1);

    namespace STDW\Contract\Database\Driver\Capability;

    use STDW\Contract\Database\Driver\DatabaseDriverInterface;
    use STDW\Contract\Database\Resource\DatabaseResourceInterface;
    use STDW\Contract\Database\QueryTree\Types\OrderDirection;
    use STDW\Contract\Database\Exception\DriverExceptionInterface;


    /**
     * Optional: lazy, memory-bounded delivery. Requires supportsStreaming().
     *
     * @phpstan-import-type Filter from DatabaseDriverInterface
     * @phpstan-import-type Pagination from DatabaseDriverInterface
     */
    interface StreamingInterface
    {
        /**
         * Lazily streams a bounded result set (generator/cursor), avoiding
         * loading the full set into memory at once; the result set is bounded
         * by $pagination. stream() is the lazy counterpart of both
         * DatabaseDriverInterface::list() and SearchInterface::search() — its
         * only concern is memory-bounded delivery. The $filter is evaluated by
         * its dialect, exactly like list()/search():
         *   - empty $filter — streams the full enumeration;
         *   - structured predicates (equality, IN, ranges) — same evaluation as
         *     list(); always available;
         *   - search semantics (FTS, $text, regex) — same evaluation as search();
         *     requires supportsSearch().
         * $order and $pagination follow the canonical shape defined in
         * DatabaseDriverInterface::list().
         *
         * @param DatabaseResourceInterface $resource
         * @param Filter $filter
         * @param array<string, OrderDirection> $order
         * @param Pagination $pagination
         * @return iterable<int, mixed>
         * @throws DriverExceptionInterface
         */
        public function stream(DatabaseResourceInterface $resource, array $filter = [], array $order = [], array $pagination = []): iterable;
    }
