<?php declare(strict_types=1);

    namespace STDW\Contract\Database\Manager;

    use STDW\Contract\Database\Connection\DatabaseConnectionInterface;

    use STDW\Contract\Database\Exception\ManagerExceptionInterface;


    /**
     * Creates connection instances. The seam for DI: an implementation may
     * delegate to any container. Builds the connection (DI-ready, config via
     * constructor); opening is triggered separately via connect().
     */
    interface ConnectionFactoryInterface
    {
        /**
         * @param array<string, mixed> $config
         * @return DatabaseConnectionInterface
         * @throws ManagerExceptionInterface
         */
        public function make(array $config): DatabaseConnectionInterface;
    }
