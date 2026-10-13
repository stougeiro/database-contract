<?php declare(strict_types=1);

    namespace STDW\Contract\Database;


    /**
     * Announces which optional, engine-level capabilities a driver honors.
     * Each supportsX() method answers for one Capability\ contract; when it
     * returns false, that capability's operations are unsupported. Ordering
     * and pagination (limit/offset/order) are baseline: they belong to the
     * core read operations and have no capability flag.
     */
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
         * text matching).
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