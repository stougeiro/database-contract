<?php declare(strict_types=1);

    namespace STDW\Contract\Database;


    interface DatabaseConnectionInterface
    {
        /**
         * @param string $resource
         * @param array $data
         * @return mixed
         */
        public function create(string $resource, array $data): mixed;

        /**
         * @param string $resource
         * @param array $primaryKey
         * @return null|array
         */
        public function read(string $resource, array $primaryKey): ?array;

        /**
         * @param string $resource
         * @param array $filters
         * @param array $options
         * @return array
         */
        public function list(string $resource, array $filters = [], array $options = []): array;

        /**
         * @param string $resource
         * @param array $data
         * @param array $where
         * @return int
         */
        public function update(string $resource, array $data, array $where): int;

        /**
         * @param string $resource
         * @param array $where
         * @return int
         */
        public function delete(string $resource, array $where): int;

        /**
         * @param string $resource
         * @param array $query
         * @param array $options
         * @return array
         */
        public function search(string $resource, array $query, array $options = []): array;

        /**
         * @param string $resource
         * @param array $filters
         * @return int
         */
        public function total(string $resource, array $filters = []): int;

        /** @return DatabaseCapabilitiesInterface
         */
        public function capabilities(): DatabaseCapabilitiesInterface;
    }