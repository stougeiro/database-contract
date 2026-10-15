<?php declare(strict_types=1);

    namespace STDW\Contract\Database\Driver\Capability;

    use STDW\Contract\Database\Driver\DatabaseDriverInterface;
    use STDW\Contract\Database\Resource\DatabaseResourceInterface;
    use STDW\Contract\Database\Result\ResultInterface;
    use STDW\Contract\Database\SQT\Types\OrderDirection;


    /**
     * Optional: on-demand text matching. Requires supportsSearch().
     *
     * @phpstan-import-type Filter from DatabaseDriverInterface
     * @phpstan-import-type Pagination from DatabaseDriverInterface
     */
    interface SearchInterface
    {
        /**
         * Lists records filtered on demand, evaluating $filter with
         * matching/indexed text semantics (FTS, $text, regex) — unlike
         * DatabaseDriverInterface::list(), which evaluates $filter as
         * exact/structured predicates. Drivers must support search, per
         * supportsSearch(), for this to be honored. $order and $pagination
         * follow the canonical shape defined in DatabaseDriverInterface::list().
         *
         * @param DatabaseResourceInterface $resource
         * @param Filter $filter
         * @param array<string, OrderDirection> $order
         * @param Pagination $pagination
         * @return ResultInterface
         */
        public function search(DatabaseResourceInterface $resource, array $filter = [], array $order = [], array $pagination = []): ResultInterface;
    }
