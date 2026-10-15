<?php declare(strict_types=1);

    namespace STDW\Contract\Database\Manager;

    use STDW\Contract\Database\Connection\DatabaseConnectionInterface;
    use STDW\Contract\Database\Driver\DatabaseDriverInterface;


    /**
     * Orchestrates drivers, connections, factories and resolvers.
     * The manager decides which driver to use and keeps connections alive.
     * Its configuration (named connections) is provided at construction
     * time (e.g. from config/database.php); it is never registered at
     * runtime. driver() resolves the target driver via
     * DriverResolverInterface and builds it via DriverFactoryInterface
     * according to its configuration. It never knows about the query
     * tree (QueryTree).
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
    }
