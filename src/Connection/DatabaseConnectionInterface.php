<?php declare(strict_types=1);

    namespace STDW\Contract\Database\Connection;


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
        public function begin(): void;

        /** @return void 
         */
        public function commit(): void;

        /** @return void 
         */
        public function rollback(): void;

        /** @return mixed
         */
        public function handle(): mixed;

        /** @return void 
         */
        public function disconnect(): void;
    }
