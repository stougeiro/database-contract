<?php declare(strict_types=1);

    namespace STDW\Contract\Database\Capability;


    /** Optional: lazy, memory-bounded delivery. Requires supportsStreaming().
     */
    interface StreamingInterface
    {
        /**
         * Lazily streams a bounded result set (generator/cursor), avoiding
         * loading the full set into memory at once; the result set is bounded
         * by the limit option. stream() is the lazy counterpart of both list()
         * and search() — its only concern is memory-bounded delivery. Requires
         * supportsStreaming(). The $where is evaluated by its dialect, exactly
         * like list()/search():
         *   - empty $where — streams the full enumeration (bounded by limit;
         *     always available);
         *   - structured predicates (equality, IN, ranges) — same evaluation as
         *     list(); always available;
         *   - search semantics (FTS, $text, regex) — same evaluation as search();
         *     requires supportsSearch().
         * The $options follow the canonical shape defined in
         * \STDW\Contract\Database\DatabaseConnectionInterface::list().
         *
         * @param string $resource
         * @param array<string, mixed> $where
         * @param array{limit?: int, offset?: int, order?: array<string, 'asc'|'desc'>} $options
         * @return iterable<int, array<string, mixed>>
         */
        public function stream(string $resource, array $where = [], array $options = []): iterable;
    }