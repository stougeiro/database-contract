<?php declare(strict_types=1);

    namespace STDW\Contract\Database\Manager;

    use STDW\Contract\Database\Connection\DatabaseConnectionInterface;
    use STDW\Contract\Database\Driver\DatabaseDriverInterface;
    use STDW\Contract\Database\Exception\ManagerExceptionInterface;


    /**
     * Creates connections and drivers. The seam for DI: an implementation may
     * delegate to any container. The manager caches connections inline and
     * never knows about the query tree (QueryTree); drivers receive the
     * connection already built, by injection.
     */
    interface DatabaseFactoryInterface
    {
        /**
         * Builds a connection (DI-ready, config via constructor); opening is
         * triggered separately via connect().
         *
         * @param array<string, mixed> $config
         * @return DatabaseConnectionInterface
         * @throws ManagerExceptionInterface
         */
        public function connection(array $config): DatabaseConnectionInterface;

        /**
         * @param string $alias Driver alias (e.g. "pdo-mysql")
         * @param DatabaseConnectionInterface $connection
         * @param array<string, mixed> $config Driver-level config
         * @return DatabaseDriverInterface
         * @throws ManagerExceptionInterface
         */
        public function driver(string $alias, DatabaseConnectionInterface $connection, array $config = []): DatabaseDriverInterface;
    }
