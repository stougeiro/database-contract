<?php declare(strict_types=1);

    namespace STDW\Contract\Database\Capability;


    /** Optional: runs aggregations. Requires supportsAggregation().
     */
    interface AggregationInterface
    {
        /**
         * Runs an aggregation pipeline over a resource. The pipeline shape is
         * defined by the driver.
         *
         * @param string $resource
         * @param array<int, array<string, mixed>> $pipeline
         * @return mixed Driver-defined aggregate result.
         */
        public function aggregate(string $resource, array $pipeline): mixed;
    }
