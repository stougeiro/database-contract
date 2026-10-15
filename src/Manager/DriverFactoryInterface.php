<?php declare(strict_types=1);

    namespace STDW\Contract\Database\Manager;

    use STDW\Contract\Database\Driver\DatabaseDriverInterface;


    /**
     * Creates driver instances.
     */
    interface DriverFactoryInterface
    {
        /**
         * @param string $driver
         * @param array<string, mixed> $config
         * @return DatabaseDriverInterface
         */
        public function make(string $driver, array $config = []): DatabaseDriverInterface;
    }
