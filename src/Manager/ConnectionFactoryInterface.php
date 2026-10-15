<?php declare(strict_types=1);

    namespace STDW\Contract\Database\Manager;

    use STDW\Contract\Database\Connection\DatabaseConnectionInterface;


    /**
     * Creates connection instances.
     */
    interface ConnectionFactoryInterface
    {
        /**
         * @param array<string, mixed> $config
         * @return DatabaseConnectionInterface
         */
        public function make(array $config): DatabaseConnectionInterface;
    }
