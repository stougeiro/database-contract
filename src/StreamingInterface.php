<?php declare(strict_types=1);

    namespace STDW\Contract\Database;


    interface StreamingInterface
    {
        /**
         * Streams records as an iterable (generator/cursor), avoiding loading
         * the full result set into memory.
         * Canonical options:
         *   - limit: int
         *   - offset: int
         *   - order: array<string, 'asc'|'desc'>
         * Options not supported by the driver (per capabilities()) are ignored.
         *
         * @param string $resource
         * @param array<string, mixed> $filters
         * @param array{limit?: int, offset?: int, order?: array<string, 'asc'|'desc'>} $options
         * @return iterable<int, array<string, mixed>>
         */
        public function stream(string $resource, array $filters = [], array $options = []): iterable;
    }