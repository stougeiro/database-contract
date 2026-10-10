<?php declare(strict_types=1);

    namespace STDW\Contract\Database;


    interface AggregationInterface
    {
        /**
         * @param string $resource
         * @param array $pipeline
         * @return mixed
         */
        public function aggregate(string $resource, array $pipeline): mixed;
    }
