<?php declare(strict_types=1);

    namespace STDW\Contract\Database;


    /** Read-only access to a driver's configuration values.
     */
    interface DatabaseConfigInterface
    {
        /**
         * Returns the configuration value for $key, or $default when absent.
         *
         * @param string $key
         * @param mixed $default
         * @return mixed
         */
        public function get(string $key, mixed $default = null): mixed;

        /**
         * Whether a configuration value exists for $key.
         *
         * @param string $key
         * @return bool
         */
        public function has(string $key): bool;

        /** @return array<string, mixed>
         */
        public function all(): array;

        /** @return bool
         */
        public function validate(): bool;
    }