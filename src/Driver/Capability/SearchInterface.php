<?php declare(strict_types=1);

    namespace STDW\Contract\Database\Driver\Capability;

    use STDW\Contract\Database\Driver\DatabaseDriverInterface;
    use STDW\Contract\Database\QueryTree\Node\GroupNodeInterface;
    use STDW\Contract\Database\QueryTree\Node\OrderNodeInterface;
    use STDW\Contract\Database\QueryTree\Node\PaginationNodeInterface;
    use STDW\Contract\Database\Resource\DatabaseResourceInterface;
    use STDW\Contract\Database\Result\ResultInterface;
    use STDW\Contract\Database\Exception\DriverExceptionInterface;


    /**
     * Optional: on-demand text matching. Requires supportsSearch().
     *
     * @phpstan-import-type Order from DatabaseDriverInterface
     */
    interface SearchInterface
    {
        /**
         * Lists records filtered on demand, evaluating $filter with
         * matching/indexed text semantics (FTS, $text, regex) — unlike
         * DatabaseDriverInterface::list(), which evaluates $filter as
         * exact/structured predicates. Drivers must support search, per
         * supportsSearch(), for this to be honored. $order and $pagination
         * follow the canonical shape defined in DatabaseDriverInterface::list()
         * and are honored only if the driver supports them.
         *
         * @param DatabaseResourceInterface $resource
         * @param null|GroupNodeInterface $filter
         * @param Order $order
         * @param null|PaginationNodeInterface $pagination
         * @return ResultInterface
         * @throws DriverExceptionInterface
         */
        public function search(DatabaseResourceInterface $resource, ?GroupNodeInterface $filter = null, array $order = [], ?PaginationNodeInterface $pagination = null): ResultInterface;
    }
