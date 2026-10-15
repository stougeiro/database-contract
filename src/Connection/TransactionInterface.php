<?php declare(strict_types=1);

    namespace STDW\Contract\Database\Connection;


    interface TransactionInterface
    {
        /** @return bool 
         */
        public function begin(): bool;

        /** @return void 
         */
        public function commit(): void;

        /** @return void 
         */
        public function rollback(): void;
    }
