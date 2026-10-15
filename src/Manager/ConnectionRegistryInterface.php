<?php declare(strict_types=1);

    namespace STDW\Contract\Database\Manager;

    use STDW\Contract\Database\Connection\DatabaseConnectionInterface;
    use STDW\Contract\Database\Exception\ManagerExceptionInterface;


    /**
     * Stores and retrieves open connections by name (the live pool).
     * Construction is the factory's job; this registry only caches.
     */
    interface ConnectionRegistryInterface
    {
        /**
         * @param string $name
         * @param DatabaseConnectionInterface $connection
         * @return void
         */
        public function add(string $name, DatabaseConnectionInterface $connection): void;

        /**
         * @param string $name
         * @return DatabaseConnectionInterface
         * @throws ManagerExceptionInterface
         */
        public function get(string $name): DatabaseConnectionInterface;

        /**
         * @param string $name
         * @return bool
         */
        public function has(string $name): bool;

        /** @return array<string, DatabaseConnectionInterface>
         */
        public function all(): array;

        /**
         * @param string $name
         * @return void
         */
        public function remove(string $name): void;
    }
