<?php declare(strict_types=1);

    namespace STDW\Contract\Database;


    interface DatabaseConnectionInterface
    {
        /**
         * Persists a new record and returns the stored record (driver fills
         * in server-generated values such as ids and timestamps).
         *
         * @param string $resource
         * @param array<string, mixed> $data
         * @return array<string, mixed>
         */
        public function create(string $resource, array $data): array;

        /**
         * Fetches a single record by its primary key (simple or composite).
         *
         * @param string $resource
         * @param array<string, mixed> $primaryKey
         * @return null|array<string, mixed>
         */
        public function read(string $resource, array $primaryKey): ?array;

        /**
         * Lists records matching structured filters.
         * Canonical options:
         *   - limit: int
         *   - offset: int
         *   - order: array<string, 'asc'|'desc'>
         * Options not supported by the driver (per capabilities()) are ignored.
         *
         * @param string $resource
         * @param array<string, mixed> $filters
         * @param array{limit?: int, offset?: int, order?: array<string, 'asc'|'desc'>} $options
         * @return array<int, array<string, mixed>>
         */
        public function list(string $resource, array $filters = [], array $options = []): array;

        /**
         * Updates records matching $where and returns the affected records count.
         *
         * @param string $resource
         * @param array<string, mixed> $data
         * @param array<string, mixed> $where
         * @return int Affected records count.
         */
        public function update(string $resource, array $data, array $where): int;

        /**
         * Deletes records matching $where and returns the affected records count.
         *
         * @param string $resource
         * @param array<string, mixed> $where
         * @return int Affected records count.
         */
        public function delete(string $resource, array $where): int;

        /**
         * Searches records by matching/indexed text semantics (drivers must
         * support search, per capabilities(), for this to be honored).
         * Canonical options:
         *   - limit: int
         *   - offset: int
         *   - order: array<string, 'asc'|'desc'>
         *
         * @param string $resource
         * @param array<string, mixed> $query
         * @param array{limit?: int, offset?: int, order?: array<string, 'asc'|'desc'>} $options
         * @return array<int, array<string, mixed>>
         */
        public function search(string $resource, array $query, array $options = []): array;

        /**
         * @param string $resource
         * @param array<string, mixed> $filters
         * @return int
         */
        public function total(string $resource, array $filters = []): int;

        /** @return DatabaseCapabilitiesInterface
         */
        public function capabilities(): DatabaseCapabilitiesInterface;
    }