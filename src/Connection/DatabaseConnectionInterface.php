<?php declare(strict_types=1);

    namespace STDW\Contract\Database\Connection;

    use STDW\Contract\Database\Result\ResultInterface;


    /**
     * Core connection contract.
     */
    interface DatabaseConnectionInterface
    {
        /** @param array<string, mixed> $config
         */
        public function connect(array $config): void;

        /** @return void 
         */
        public function disconnect(): void;

        /** @return bool 
         */
        public function isConnected(): bool;

        /**
         * Execute a raw statement.
         */
        public function execute(string $statement, array $params = []): ResultInterface;

        /** @return mixed */
        public function handle(): mixed;
    }
