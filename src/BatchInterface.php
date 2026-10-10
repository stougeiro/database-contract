<?php declare(strict_types=1);

    namespace STDW\Contract\Database;


    interface BatchInterface
    {
        /**
         * @param string $resource
         * @param array $rows
         * @return int
         */
        public function insertMany(string $resource, array $rows): int;

        /**
         * @param string $resource
         * @param array $rows
         * @param array $where
         * @return int
         */
        public function updateMany(string $resource, array $rows, array $where): int;

        /**
         * @param string $resource
         * @param array $where
         * @return int
         */
        public function deleteMany(string $resource, array $where): int;
    }
