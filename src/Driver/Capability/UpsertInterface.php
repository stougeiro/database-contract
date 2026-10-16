<?php declare(strict_types=1);

    namespace STDW\Contract\Database\Driver\Capability;

    use STDW\Contract\Database\Param\ParamInterface;
    use STDW\Contract\Database\QueryTree\Node\GroupNodeInterface;
    use STDW\Contract\Database\Resource\DatabaseResourceInterface;
    use STDW\Contract\Database\Result\ResultInterface;
    use STDW\Contract\Database\Exception\DriverExceptionInterface;


    /**
     * Optional: idempotent upsert (insert-if-absent, update-otherwise).
     * Requires supportsUpsert(). Maps to SQL MERGE / ON CONFLICT, MongoDB
     * findAndModify(upsert), and idempotent PUT on APIs.
     */
    interface UpsertInterface
    {
        /**
         * @param DatabaseResourceInterface $resource
         * @param array<string, ParamInterface> $data
         * @param GroupNodeInterface $filter
         * @return ResultInterface
         * @throws DriverExceptionInterface
         */
        public function upsert(DatabaseResourceInterface $resource, array $data, GroupNodeInterface $filter): ResultInterface;
    }
