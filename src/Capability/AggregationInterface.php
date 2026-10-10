<?php declare(strict_types=1);

    namespace STDW\Contract\Database\Capability;


    interface AggregationInterface
    {
        /**
         * Runs an aggregation pipeline over a resource.
         *
         * @param string $resource
         * @param array<int, array<string, mixed>> $pipeline
         * @return mixed
         */
        public function aggregate(string $resource, array $pipeline): mixed;
    }
