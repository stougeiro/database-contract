<?php declare(strict_types=1);

    namespace STDW\Contract\Database\Capability;


    /** Optional: bulk write operations. Requires supportsBatch().
     */
    interface BatchInterface
    {
        /**
         * Inserts each row independently and returns the total inserted count.
         *
         * @param string $resource
         * @param array<int, array<string, mixed>> $rows
         * @return int Total inserted records count.
         */
        public function insertMany(string $resource, array $rows): int;

        /**
         * Applies each entry independently: the data of an entry is applied to
         * the records matching that same entry's where. Returns the sum of the
         * affected records across all entries.
         *
         * @param string $resource
         * @param array<int, array{data: array<string, mixed>, where: array<string, mixed>}> $rows
         * @return int Sum of affected records across all entries.
         */
        public function updateMany(string $resource, array $rows): int;
    }
