<?php declare(strict_types=1);

    namespace STDW\Contract\Database;


    interface EventfulInterface
    {
        /**
         * @param string $event
         * @param callable $listener
         * @return void
         */
        public function on(string $event, callable $listener): void;
    }