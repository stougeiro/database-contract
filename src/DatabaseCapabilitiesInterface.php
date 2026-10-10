<?php declare(strict_types=1);

    namespace STDW\Contract\Database;


    interface DatabaseCapabilitiesInterface
    {
        /** @return bool
         */
        public function supportsTransactions(): bool;

        /** @return bool
         */
        public function supportsBatch(): bool;

        /** @return bool
         */
        public function supportsStreaming(): bool;

        /** @return bool
         */
        public function supportsAggregation(): bool;

        /** @return bool
         */
        public function supportsSearch(): bool;

        /** @return bool
         */
        public function supportsOrdering(): bool;

        /** @return bool
         */
        public function supportsPagination(): bool;
    }
