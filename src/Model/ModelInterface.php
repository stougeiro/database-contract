<?php declare(strict_types=1);

    namespace STDW\Contract\Database\Model;


    interface ModelInterface
    {
        /**
         * Persists a new record and returns the stored record (driver fills
         * in server-generated values such as ids and timestamps).
         *
         * @param array<string, mixed> $data
         * @return array<string, mixed>
         */
        public function create(array $data): array;

        /**
         * Fetches a single record by its primary key (simple or composite).
         *
         * @param array<string, mixed> $primaryKey
         * @return null|array<string, mixed>
         */
        public function read(array $primaryKey): ?array;

        /**
         * Enumerates records purely by options (no filtering). Filtering is a
         * search concern; search() provides on-demand filtered listings.
         * Canonical options:
         *   - limit: int
         *   - offset: int
         *   - order: array<string, 'asc'|'desc'>
         *
         * @param array{limit?: int, offset?: int, order?: array<string, 'asc'|'desc'>} $options
         * @return array<int, array<string, mixed>>
         */
        public function list(array $options = []): array;

        /**
         * Updates records matching $where and returns the affected records count.
         *
         * @param array<string, mixed> $data
         * @param array<string, mixed> $where
         * @return int Affected records count.
         */
        public function update(array $data, array $where): int;

        /**
         * Deletes records matching $where and returns the affected records count.
         *
         * @param array<string, mixed> $where
         * @return int Affected records count.
         */
        public function delete(array $where): int;

        /**
         * Searches records by matching/indexed text semantics (drivers must
         * support search, per capabilities(), for this to be honored).
         *
         * @param array<string, mixed> $query
         * @param array{limit?: int, offset?: int, order?: array<string, 'asc'|'desc'>} $options
         * @return array<int, array<string, mixed>>
         */
        public function search(array $query, array $options = []): array;

        /**
         * Counts records: empty $query counts the enumeration (list); a
         * provided $query counts the filtered search (requires supportsSearch).
         *
         * @param array<string, mixed> $query
         * @return int
         */
        public function total(array $query = []): int;

        /** @return ResourceMetadataInterface
         */
        public function metadata(): ResourceMetadataInterface;
    }