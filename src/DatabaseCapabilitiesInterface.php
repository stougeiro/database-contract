<?php declare(strict_types=1);

    namespace STDW\Contract\Database;


    interface DatabaseCapabilitiesInterface
    {
        /**
         * Whether Capability\AggregationInterface operations are honored.
         *
         * @return bool
         */
        public function supportsAggregation(): bool;

        /**
         * Whether Capability\BatchInterface operations are honored.
         *
         * @return bool
         */
        public function supportsBatch(): bool;

        /**
         * Whether Capability\SearchInterface semantics are honored (indexed
         * text matching). Ordering and pagination (limit/offset/order) are
         * baseline and always expected.
         *
         * @return bool
         */
        public function supportsSearch(): bool;

        /**
         * Whether Capability\StreamingInterface operations are honored.
         *
         * @return bool
         */
        public function supportsStreaming(): bool;

        /**
         * Whether the driver exercises transactions. Drivers that return true
         * also implement Capability\TransactionInterface.
         *
         * @return bool
         */
        public function supportsTransactions(): bool;
    }