<?php declare(strict_types=1);

    namespace STDW\Contract\Database\Driver;


    /**
     * Announces which optional, engine-level capabilities a driver honors.
     * Each supportsX() method answers for one Driver\Capability\ contract;
     * when it returns false, that capability's operations are unsupported.
     * Ordering and pagination (limit/offset/order) are baseline: they belong
     * to the core read operations and have no capability flag.
     */
    interface DriverCapabilitiesInterface
    {
        /** @return bool 
         */
        public function supportsAggregation(): bool;

        /** @return bool 
         */
        public function supportsBatch(): bool;

        /** @return bool 
         */
        public function supportsSearch(): bool;

        /** @return bool 
         */
        public function supportsStreaming(): bool;

        /** @return bool 
         */
        public function supportsTransactions(): bool;
    }
