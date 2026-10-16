<?php declare(strict_types=1);

    namespace STDW\Contract\Database\Driver\Capability;

    use STDW\Contract\Database\Param\ParamInterface;
    use STDW\Contract\Database\QueryTree\Node\GroupNodeInterface;
    use STDW\Contract\Database\Resource\DatabaseResourceInterface;
    use STDW\Contract\Database\Result\ResultInterface;
    use STDW\Contract\Database\Exception\DriverExceptionInterface;


    /**
     * Optional: bulk write operations. Requires supportsBatch().
     */
    interface BatchInterface
    {
        /**
         * Inserts each row independently. count() on the returned result is
         * the total inserted records count.
         *
         * @param DatabaseResourceInterface $resource
         * @param array<int, array<string, ParamInterface>> $rows
         * @return ResultInterface
         * @throws DriverExceptionInterface
         */
        public function insertMany(DatabaseResourceInterface $resource, array $rows): ResultInterface;

        /**
         * Applies each entry independently: the data of an entry is applied to
         * the records matching that same entry's filter. count() on the
         * returned result is the sum of the affected records across all
         * entries.
         *
         * @param DatabaseResourceInterface $resource
         * @param array<int, array{data: array<string, ParamInterface>, filter: GroupNodeInterface}> $rows
         * @return ResultInterface
         * @throws DriverExceptionInterface
         */
        public function updateMany(DatabaseResourceInterface $resource, array $rows): ResultInterface;
    }
