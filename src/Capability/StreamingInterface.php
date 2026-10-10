<?php declare(strict_types=1);

    namespace STDW\Contract\Database\Capability;


    interface StreamingInterface
    {
        /**
         * Lazily streams a bounded result set (generator/cursor), avoiding
         * loading the full set into memory at once. Streaming over enumeration
         * when $query is empty, and over search semantics when $query is
         * provided (requires supportsSearch). The result set is bounded by the
         * limit option.
         * Canonical options:
         *   - limit: int
         *   - offset: int
         *   - order: array<string, 'asc'|'desc'>
         * Options are always expected for list/search/stream/total.
         *
         * @param string $resource
         * @param array<string, mixed> $query
         * @param array{limit?: int, offset?: int, order?: array<string, 'asc'|'desc'>} $options
         * @return iterable<int, array<string, mixed>>
         */
        public function stream(string $resource, array $query = [], array $options = []): iterable;
    }