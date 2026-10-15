<?php declare(strict_types=1);

    namespace STDW\Contract\Database\Connection;

    use STDW\Contract\Database\Exception\ConnectionExceptionInterface;


    /**
     * Core connection contract: lifecycle only.
     * The connection owns the physical link and receives its configuration
     * through its constructor (DI-friendly). Opening (connect()) and closing
     * (disconnect()) are pure lifecycle operations. Query execution lives on
     * the driver (DatabaseDriverInterface); transactions are a driver
     * capability (Driver\Capability\TransactionInterface). Native access
     * (e.g. PDO) is exposed by the driver family's sub-interface
     * (e.g. PdoConnectionInterface::pdo()), never as an untyped handle here.
     */
    interface DatabaseConnectionInterface
    {
        /**
         * Opens the physical connection. Idempotent.
         *
         * @return void
         *
         * @throws ConnectionExceptionInterface
         */
        public function connect(): void;

        /** @return bool
         */
        public function isConnected(): bool;

        /** @return void
         */
        public function disconnect(): void;
    }
