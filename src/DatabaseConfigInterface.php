<?php declare(strict_types=1);

    namespace STDW\Contract\Database;


    interface DatabaseConfigInterface
    {
        /**
         * @param string $key
         * @param mixed $default
         * @return mixed
         */
        public function get(string $key, mixed $default = null): mixed;

        /**
         * @param string $key
         * @return bool
         */
        public function has(string $key): bool;

        /** @return array
         */
        public function all(): array;

        /** @return bool
         */
        public function validate(): bool;
    }