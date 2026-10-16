<?php declare(strict_types=1);

    namespace STDW\Contract\Database\Driver;

    use STDW\Contract\Database\Connection\DatabaseConnectionInterface;
    use STDW\Contract\Database\Exception\DriverExceptionInterface;
    use STDW\Contract\Database\QueryTree\Node\GroupNodeInterface;
    use STDW\Contract\Database\QueryTree\Node\OrderNodeInterface;
    use STDW\Contract\Database\QueryTree\Node\PaginationNodeInterface;
    use STDW\Contract\Database\Param\ParamInterface;
    use STDW\Contract\Database\Resource\DatabaseResourceInterface;
    use STDW\Contract\Database\Result\ResultInterface;


    /**
     * Core CRUD contract every driver must implement.
     *
     * The driver consumes the neutral query tree: filters arrive as a
     * GroupNodeInterface, ordering as a list of OrderNodeInterface and
     * pagination as a PaginationNodeInterface. The declarative array DSL
     * lives in QueryTreeBuilderInterface, which lowers it to these nodes;
     * drivers never see the arrays.
     *
     * Baseline: connection, create, read, list, update, delete and total.
     * Ordering and pagination are elective aspects of list()/search()/stream():
     * a driver that does not honor them (see DriverCapabilitiesInterface)
     * throws UnsupportedCapabilityExceptionInterface when they are requested.
     *
     * Semantics:
     * - read() returns a single record; list() returns a collection.
     * - list() without $pagination is a full scan: use with care.
     * - read() must stop at the first matching record (early-stop).
     * - total() returns the count of matching records directly.
     * - update()/delete() require a filter (no unfiltered write).
     *
     * @phpstan-type Order array<int, OrderNodeInterface>
     */
    interface DatabaseDriverInterface
    {
        /**
         * The connection this driver was built with (DI-injected).
         *
         * @return DatabaseConnectionInterface
         */
        public function connection(): DatabaseConnectionInterface;

        /**
         * @param DatabaseResourceInterface $resource
         * @param array<string, ParamInterface> $data
         * @return ResultInterface
         * @throws DriverExceptionInterface
         */
        public function create(DatabaseResourceInterface $resource, array $data): ResultInterface;

        /**
         * Returns a single record.
         *
         * @param DatabaseResourceInterface $resource
         * @param null|GroupNodeInterface $filter
         * @return ResultInterface
         * @throws DriverExceptionInterface
         */
        public function read(DatabaseResourceInterface $resource, ?GroupNodeInterface $filter = null): ResultInterface;

        /**
         * Returns a collection of records. Without $pagination this is a
         * full scan: always paginate on large resources. $order and
         * $pagination are honored only if the driver supports them.
         *
         * @param DatabaseResourceInterface $resource
         * @param null|GroupNodeInterface $filter
         * @param Order $order
         * @param null|PaginationNodeInterface $pagination
         * @return ResultInterface
         * @throws DriverExceptionInterface
         */
        public function list(DatabaseResourceInterface $resource, ?GroupNodeInterface $filter = null, array $order = [], ?PaginationNodeInterface $pagination = null): ResultInterface;

        /**
         * @param DatabaseResourceInterface $resource
         * @param array<string, ParamInterface> $data
         * @param GroupNodeInterface $filter
         * @return ResultInterface
         * @throws DriverExceptionInterface
         */
        public function update(DatabaseResourceInterface $resource, array $data, GroupNodeInterface $filter): ResultInterface;

        /**
         * @param DatabaseResourceInterface $resource
         * @param GroupNodeInterface $filter
         * @return ResultInterface
         * @throws DriverExceptionInterface
         */
        public function delete(DatabaseResourceInterface $resource, GroupNodeInterface $filter): ResultInterface;

        /**
         * Returns the number of records matching the filter.
         *
         * @param DatabaseResourceInterface $resource
         * @param null|GroupNodeInterface $filter
         * @return int
         * @throws DriverExceptionInterface
         */
        public function total(DatabaseResourceInterface $resource, ?GroupNodeInterface $filter = null): int;

        /** @return DriverCapabilitiesInterface
         */
        public function capabilities(): DriverCapabilitiesInterface;
    }
