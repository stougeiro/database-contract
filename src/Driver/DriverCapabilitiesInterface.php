<?php declare(strict_types=1);

    namespace STDW\Contract\Database\Driver;


    /**
     * Announces which optional, engine-level capabilities a driver honors.
     * Each supportsX() method answers for one capability; when it returns
     * false, that capability's operations are unsupported.
     */
    interface DriverCapabilitiesInterface
    {
        /** @return bool 
         */
        public function supportsTransactions(): bool;

        /** @return bool 
         */
        public function supportsOrdering(): bool;

        /** @return bool 
         */
        public function supportsPagination(): bool;

        /** @return bool 
         */
        public function supportsComplexFilters(): bool;

        /** @return bool 
         */
        public function supportsGroups(): bool;
    }
