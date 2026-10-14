<?php declare(strict_types=1);

    namespace STDW\Contract\Database\Model;


    /**
     * A resource-bound facade over DatabaseConnectionInterface, exposing the
     * core operations plus search without repeating the resource. Metadata is
     * exposed through the optional ResourceMetadataAwareInterface.
     */
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
         * The $options follow the canonical shape defined in
         * \STDW\Contract\Database\DatabaseConnectionInterface::list().
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
         * matching/indexed text semantics (FTS, $text, regex) — unlike list(),
         * which evaluates $where as exact/structured predicates. Requires
         * supportsSearch(). The $options follow the canonical shape defined in
         * \STDW\Contract\Database\DatabaseConnectionInterface::list().
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
         * @return int Count of matching records.
         */
        public function total(array $where = []): int;
    }