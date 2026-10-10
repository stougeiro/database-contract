<?php declare(strict_types=1);

    namespace STDW\Contract\Database\Capability;


    interface StreamingInterface
    {
        /**
         * Lazily streams a bounded result set (generator/cursor), avoiding
         * loading the full set into memory at once. Streams the enumeration
         * when $where is empty, and search semantics when $where is provided
         * (requires supportsSearch). The result set is bounded by the limit
         * option.
         * Canonical options:
         *   - limit: int
         *   - offset: int
         *   - order: array<string, 'asc'|'desc'>
         *
         * @param string $resource
         * @param array<string, mixed> $where
         * @param array{limit?: int, offset?: int, order?: array<string, 'asc'|'desc'>} $options
         * @return iterable<int, array<string, mixed>>
         */
        public function stream(string $resource, array $where = [], array $options = []): iterable;
    }