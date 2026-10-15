<?php declare(strict_types=1);

    namespace STDW\Contract\Database\Manager;


    /**
     * Resolves a driver instance by name.
     */
    interface DriverResolverInterface
    {
        /**
         * @param string $name
         * @return \STDW\Contract\Database\Driver\DatabaseDriverInterface
         */
        public function resolve(string $name): \STDW\Contract\Database\Driver\DatabaseDriverInterface;
    }
