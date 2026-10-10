<?php declare(strict_types=1);

    namespace STDW\Contract\Database;


    interface StreamingInterface
    {
        /**
         * @param string $resource
         * @param array $filters
         * @param array $options
         * @return iterable
         */
        public function stream(string $resource, array $filters = [], array $options = []): iterable;
    }
