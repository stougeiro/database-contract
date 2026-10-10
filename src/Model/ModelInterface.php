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
         * Enumerates records matching structured predicates. The $where is
         * evaluated as exact/structured conditions (equality, IN, ranges),
         * unlike search() which applies matching/indexed text semantics.
         * Canonical options:
         *   - limit: int
         *   - offset: int
         *   - order: array<string, 'asc'|'desc'>
         *
         * @param array<string, mixed> $where
         * @param array{limit?: int, offset?: int, order?: array<string, 'asc'|'desc'>} $options
         * @return array<int, array<string, mixed>>
         */
        public function list(array $where = [], array $options = []): array;

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
         * Lists records filtered on demand, evaluating $where with
         * matching/indexed text semantics (requires supportsSearch).
         *
         * @param array<string, mixed> $where
         * @param array{limit?: int, offset?: int, order?: array<string, 'asc'|'desc'>} $options
         * @return array<int, array<string, mixed>>
         */
        public function search(array $where, array $options = []): array;

        /**
         * Counts records matching $where, with the same evaluation as list()
         * (exact/structured predicates) — the count counterpart of the
         * enumeration, used for pagination.
         *
         * @param array<string, mixed> $where
         * @return int
         */
        public function total(array $where = []): int;

        /** @return ResourceMetadataInterface
         */
        public function metadata(): ResourceMetadataInterface;
    }