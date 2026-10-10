<?php declare(strict_types=1);

    namespace STDW\Contract\Database;


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
    }