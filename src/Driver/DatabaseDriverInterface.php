<?php declare(strict_types=1);

    namespace STDW\Contract\Database\Driver;

    use STDW\Contract\Database\Resource\DatabaseResourceInterface;
    use STDW\Contract\Database\Result\ResultInterface;


    /**
     * Core CRUD contract every driver must implement.
     * Criteria are passed as simple arrays; the driver translates them
     * to its native format (SQL, Mongo query, REST params, etc.).
     */
    interface DatabaseDriverInterface
    {
        /**
         * @param DatabaseResourceInterface $resource
         * @param array<string, mixed> $data
         * @return ResultInterface
         */
        public function create(DatabaseResourceInterface $resource, array $data): ResultInterface;

        /**
         * @param DatabaseResourceInterface $resource
         * @param array<string, mixed> $filter
         * @return ResultInterface
         */
        public function read(DatabaseResourceInterface $resource, array $filter): ResultInterface;

        /**
         * @param DatabaseResourceInterface $resource
         * @param array<string, mixed> $filter
         * @param array<string, 'asc'|'desc'> $order
         * @param array{limit?: int, offset?: int, page?: int, perPage?: int} $pagination
         * @return ResultInterface
         */
        public function list(DatabaseResourceInterface $resource, array $filter = [], array $order = [], array $pagination = []): ResultInterface;

        /**
         * @param DatabaseResourceInterface $resource
         * @param array<string, mixed> $data
         * @param array<string, mixed> $filter
         * @return ResultInterface
         */
        public function update(DatabaseResourceInterface $resource, array $data, array $filter): ResultInterface;

        /**
         * @param DatabaseResourceInterface $resource
         * @param array<string, mixed> $filter
         * @return ResultInterface
         */
        public function delete(DatabaseResourceInterface $resource, array $filter): ResultInterface;

        /**
         * @param DatabaseResourceInterface $resource
         * @param array<string, mixed> $filter
         * @return int
         */
        public function total(DatabaseResourceInterface $resource, array $filter = []): int;

        /** @return DriverCapabilitiesInterface 
         */
        public function capabilities(): DriverCapabilitiesInterface;
    }
