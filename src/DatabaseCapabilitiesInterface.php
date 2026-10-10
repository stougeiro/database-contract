<?php declare(strict_types=1);

    namespace STDW\Contract\Database;


    interface DatabaseCapabilitiesInterface
    {
        /**
         * Whether the driver exercises transactions. Drivers that return true
         * also implement TransactionInterface.
         *
         * @return bool
         */
        public function supportsTransactions(): bool;

        /**
         * Whether BatchInterface operations are honored.
         *
         * @return bool
         */
        public function supportsBatch(): bool;

        /**
         * Whether StreamingInterface operations are honored.
         *
         * @return bool
         */
        public function supportsStreaming(): bool;

        /**
         * Whether AggregationInterface operations are honored.
         *
         * @return bool
         */
        public function supportsAggregation(): bool;

        /**
         * Whether search() semantics are honored (indexed text matching).
         *
         * @return bool
         */
        public function supportsSearch(): bool;

        /**
         * Whether the order option is honored on list/search/stream/total.
         *
         * @return bool
         */
        public function supportsOrdering(): bool;

        /**
         * Whether the limit/offset options are honored on list/search/stream/total.
         *
         * @return bool
         */
        public function supportsPagination(): bool;
    }