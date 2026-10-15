<?php declare(strict_types=1);

    namespace STDW\Contract\Database\Driver;

    use STDW\Contract\Database\Param\ParamInterface;
    use STDW\Contract\Database\Resource\DatabaseResourceInterface;
    use STDW\Contract\Database\Result\ResultInterface;


    /**
     * Core CRUD contract every driver must implement.
     * Criteria are passed as simple arrays whose values may be a
     * ParamInterface (typed, injection-safe) or a raw scalar/array;
     * the driver translates them to its native format (SQL, Mongo
     * query, REST params, etc.).
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
         * @param array<string, ParamInterface> $filter
         * @return ResultInterface
         */
        public function read(DatabaseResourceInterface $resource, array $filter = []): ResultInterface;

        /**
         * @param DatabaseResourceInterface $resource
         * @param array<string, ParamInterface> $filter
         * @param array<string, 'asc'|'desc'> $order
         * @param array{limit?: int, offset?: int, page?: int, perPage?: int} $pagination
         * @return ResultInterface
         */
        public function list(DatabaseResourceInterface $resource, array $filter = [], array $order = [], array $pagination = []): ResultInterface;

        /**
         * @param DatabaseResourceInterface $resource
         * @param array<string, ParamInterface> $data
         * @param array<string, ParamInterface> $filter
         * @return ResultInterface
         */
        public function update(DatabaseResourceInterface $resource, array $data, array $filter): ResultInterface;

        /**
         * @param DatabaseResourceInterface $resource
         * @param array<string, ParamInterface> $filter
         * @return ResultInterface
         */
        public function delete(DatabaseResourceInterface $resource, array $filter): ResultInterface;

        /**
         * @param DatabaseResourceInterface $resource
         * @param array<string, ParamInterface> $filter
         * @return ResultInterface
         */
        public function total(DatabaseResourceInterface $resource, array $filter = []): ResultInterface;

        /** @return DriverCapabilitiesInterface 
         */
        public function capabilities(): DriverCapabilitiesInterface;
    }
