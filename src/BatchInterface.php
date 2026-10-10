<?php declare(strict_types=1);

    namespace STDW\Contract\Database;


    interface BatchInterface
    {
        /**
         * @param string $resource
         * @param array<int, array<string, mixed>> $rows
         * @return int Affected records count.
         */
        public function insertMany(string $resource, array $rows): int;

        /**
         * @param string $resource
         * @param array<int, array{data: array<string, mixed>, where: array<string, mixed>}> $rows
         * @return int Affected records count.
         */
        public function updateMany(string $resource, array $rows): int;

        /**
         * @param string $resource
         * @param array<int, array<string, mixed>> $where
         * @return int Affected records count.
         */
        public function deleteMany(string $resource, array $where): int;
    }
