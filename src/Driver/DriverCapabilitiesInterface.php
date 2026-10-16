<?php declare(strict_types=1);

    namespace STDW\Contract\Database\Driver;


    /**
     * Announces which optional, engine-level capabilities a driver honors.
     * Each supportsX() answers for one Driver\Capability\ contract or for an
     * elective aspect of a core operation. When it returns false, the
     * corresponding operation/aspect is unsupported and the driver throws
     * UnsupportedCapabilityExceptionInterface if it is requested.
     *
     * Baseline (no flag): connection, create, read, list, update, delete and
     * total. Everything else is elective — including ordering and pagination,
     * which are aspects of list()/search()/stream().
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
        public function supportsOrdering(): bool;

        /** @return bool
         */
        public function supportsPaginationByCursor(): bool;

        /** @return bool
         */
        public function supportsPaginationByOffset(): bool;

        /** @return bool
         */
        public function supportsSearch(): bool;

        /** @return bool
         */
        public function supportsStreaming(): bool;

        /** @return bool
         */
        public function supportsTransactions(): bool;

        /** @return bool
         */
        public function supportsUpsert(): bool;
    }
