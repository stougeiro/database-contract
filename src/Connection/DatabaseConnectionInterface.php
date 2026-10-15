<?php declare(strict_types=1);

    namespace STDW\Contract\Database\Connection;


    /**
     * Core connection contract: lifecycle and native handle only.
     * Query execution lives on the driver (DatabaseDriverInterface);
     * transactions are a driver capability (Driver\Capability\TransactionInterface).
     */
    interface DatabaseConnectionInterface
    {
        /**
         * Establishes the connection and returns the connected instance.
         *
         * @param array<string, mixed> $config
         * @return static
         */
        public function connect(array $config): static;

        /** @return bool 
         */
        public function isConnected(): bool;

        /** @return mixed
         */
        public function handle(): mixed;

        /** @return void 
         */
        public function disconnect(): void;
    }
