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
         * Enumerates records purely by options (no filtering). Filtering is a
         * search concern; search() (SearchInterface, when supported) provides
         * on-demand filtered listings.
         * Canonical options:
         *   - limit: int
         *   - offset: int
         *   - order: array<string, 'asc'|'desc'>
         *
         * @param string $resource
         * @param array{limit?: int, offset?: int, order?: array<string, 'asc'|'desc'>} $options
         * @return array<int, array<string, mixed>>
         */
        public function list(string $resource, array $options = []): array;

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
         * Counts records: empty $query counts the enumeration (list); a
         * provided $query counts the filtered search (requires supportsSearch).
         *
         * @param string $resource
         * @param array<string, mixed> $query
         * @return int
         */
        public function total(string $resource, array $query = []): int;

        /** @return DatabaseCapabilitiesInterface
         */
        public function capabilities(): DatabaseCapabilitiesInterface;
    }