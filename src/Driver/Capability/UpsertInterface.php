<?php declare(strict_types=1);

    namespace STDW\Contract\Database\Driver\Capability;

    use STDW\Contract\Database\Param\ParamInterface;
    use STDW\Contract\Database\Resource\DatabaseResourceInterface;
    use STDW\Contract\Database\Result\ResultInterface;
    use STDW\Contract\Database\Driver\DatabaseDriverInterface;
    use STDW\Contract\Database\Exception\DriverExceptionInterface;


    /**
     * Optional: idempotent upsert (insert-if-absent, update-otherwise).
     * Requires supportsUpsert(). Maps to SQL MERGE / ON CONFLICT, MongoDB
     * findAndModify(upsert), and idempotent PUT on APIs.
     *
     * @phpstan-import-type Filter from DatabaseDriverInterface
     */
    interface UpsertInterface
    {
        /**
         * @param DatabaseResourceInterface $resource
         * @param array<string, ParamInterface> $data
         * @param Filter $filter
         * @return ResultInterface
         * @throws DriverExceptionInterface
         */
        public function upsert(DatabaseResourceInterface $resource, array $data, array $filter): ResultInterface;
    }
