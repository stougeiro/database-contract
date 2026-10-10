<?php declare(strict_types=1);

    namespace STDW\Contract\Database;


    interface ModelInterface
    {
        /**
         * @param array $data
         * @return mixed
         */
        public function create(array $data): mixed;

        /**
         * @param array $primaryKey
         * @return null|array
         */
        public function read(array $primaryKey): ?array;

        /**
         * @param array $filters
         * @param array $options
         * @return array
         */
        public function list(array $filters = [], array $options = []): array;

        /**
         * @param array $data
         * @param array $where
         * @return int
         */
        public function update(array $data, array $where): int;

        /**
         * @param array $where
         * @return int
         */
        public function delete(array $where): int;

        /**
         * @param array $query
         * @param array $options
         * @return array
         */
        public function search(array $query, array $options = []): array;

        /**
         * @param array $filters
         * @return int
         */
        public function total(array $filters = []): int;

        /** @return ResourceMetadataInterface
         */
        public function metadata(): ResourceMetadataInterface;
    }