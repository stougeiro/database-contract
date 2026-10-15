<?php declare(strict_types=1);

    namespace STDW\Contract\Database\Driver\Capability;

    use STDW\Contract\Database\Exception\DriverExceptionInterface;


    /**
     * Optional: transactional control. Requires supportsTransactions().
     */
    interface TransactionInterface
    {
        /**
         * @return void
         * @throws DriverExceptionInterface
         */
        public function begin(): void;

        /**
         * @return void
         * @throws DriverExceptionInterface
         */
        public function commit(): void;

        /**
         * @return void
         * @throws DriverExceptionInterface
         */
        public function rollback(): void;

        /** @return bool
         */
        public function inTransaction(): bool;
    }
