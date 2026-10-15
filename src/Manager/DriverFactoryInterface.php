<?php declare(strict_types=1);

    namespace STDW\Contract\Database\Manager;

    use STDW\Contract\Database\Connection\DatabaseConnectionInterface;
    use STDW\Contract\Database\Driver\DatabaseDriverInterface;
    use STDW\Contract\Database\Exception\ManagerExceptionInterface;


    /**
     * Creates driver instances. The seam for DI: an implementation may
     * delegate to any container. Receives the connection already built by
     * ConnectionFactoryInterface, so the driver gets it by injection.
     */
    interface DriverFactoryInterface
    {
        /**
         * @param string $driver Driver alias (e.g. "pdo-mysql")
         * @param DatabaseConnectionInterface $connection
         * @param array<string, mixed> $config Driver-level config
         * @return DatabaseDriverInterface
         * @throws ManagerExceptionInterface
         */
        public function make(string $driver, DatabaseConnectionInterface $connection, array $config = []): DatabaseDriverInterface;
    }
