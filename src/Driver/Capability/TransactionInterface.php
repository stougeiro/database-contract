<?php declare(strict_types=1);

    namespace STDW\Contract\Database\Driver\Capability;


    /**
     * Optional: transactional control. Requires supportsTransactions().
     */
    interface TransactionInterface
    {
        /** @return void 
         */
        public function begin(): void;

        /** @return void 
         */
        public function commit(): void;

        /** @return void 
         */
        public function rollback(): void;

        /** @return bool 
         */
        public function inTransaction(): bool;
    }
