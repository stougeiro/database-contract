<?php declare(strict_types=1);

    namespace STDW\Contract\Database\Driver\Capability;

    use STDW\Contract\Database\Resource\DatabaseResourceInterface;
    use STDW\Contract\Database\Result\ResultInterface;


    /**
     * Optional: runs aggregations. Requires supportsAggregation().
     */
    interface AggregationInterface
    {
        /**
         * Runs an aggregation pipeline over a resource. The pipeline shape is
         * defined by the driver.
         *
         * @param DatabaseResourceInterface $resource
         * @param array<int, array<string, mixed>> $pipeline
         * @return ResultInterface
         */
        public function aggregate(DatabaseResourceInterface $resource, array $pipeline): ResultInterface;
    }
