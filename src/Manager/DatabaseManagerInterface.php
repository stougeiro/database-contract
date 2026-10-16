<?php declare(strict_types=1);

    namespace STDW\Contract\Database\Manager;

    use STDW\Contract\Database\Connection\DatabaseConnectionInterface;
    use STDW\Contract\Database\Driver\DatabaseDriverInterface;
    use STDW\Contract\Database\Exception\ManagerExceptionInterface;


    /**
     * Orchestrates drivers and connections.
     * The manager decides which driver to use and keeps connections alive.
     * Its configuration (named connections) is provided at construction
     * time (e.g. from config/database.php); it is never registered at
     * runtime. connection() builds drivers via DatabaseFactoryInterface and
     * caches connections inline; driver() receives that connection and builds
     * the driver through the same factory. It never knows about the query
     * tree (QueryTree).
     */
    interface DatabaseManagerInterface
    {
        /**
         * @param string|null $name Connection name; null for default.
         * @return DatabaseConnectionInterface
         * @throws ManagerExceptionInterface
         */
        public function connection(?string $name = null): DatabaseConnectionInterface;

        /**
         * @param string|null $name Driver name; null for default.
         * @return DatabaseDriverInterface
         * @throws ManagerExceptionInterface
         */
        public function driver(?string $name = null): DatabaseDriverInterface;

        /**
         * @param string|null $name Connection name; null for default.
         * @return void
         * @throws ManagerExceptionInterface
         */
        public function disconnect(?string $name = null): void;

        /**
         * @return void
         * @throws ManagerExceptionInterface
         */
        public function purge(): void;
    }
