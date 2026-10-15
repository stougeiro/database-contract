<?php declare(strict_types=1);

    namespace STDW\Contract\Database\Manager;

    use STDW\Contract\Database\Connection\DatabaseConnectionInterface;
    use STDW\Contract\Database\Driver\DatabaseDriverInterface;


    /**
     * Orchestrates drivers, connections, factories and resolvers.
     * The manager decides which driver to use and keeps connections alive.
     * It never knows about SQT.
     */
    interface DatabaseManagerInterface
    {
        /**
         * @param string|null $name Connection name; null for default.
         * @return DatabaseConnectionInterface
         */
        public function connection(?string $name = null): DatabaseConnectionInterface;

        /**
         * @param string|null $name Driver name; null for default.
         * @return DatabaseDriverInterface
         */
        public function driver(?string $name = null): DatabaseDriverInterface;

        /**
         * @param string|null $name Connection name; null for default.
         * @return void
         */
        public function disconnect(?string $name = null): void;

        /** @return void 
         */
        public function purge(): void;

        /**
         * @param callable $callback
         * @return mixed
         */
        public function transaction(callable $callback): mixed;
    }
