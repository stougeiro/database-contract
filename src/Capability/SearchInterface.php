<?php declare(strict_types=1);

    namespace STDW\Contract\Database\Capability;


    /** Optional: on-demand text matching. Requires supportsSearch().
     */
    interface SearchInterface
    {
        /**
         * Lists records filtered on demand, evaluating $where with
         * matching/indexed text semantics (FTS, $text, regex) — unlike list(),
         * which evaluates $where as exact/structured predicates. Drivers must
         * support search, per supportsSearch(), for this to be honored. When
         * the underlying resource does not support the driver's search
         * semantics, the driver throws a clear exception. The $options follow
         * the canonical shape defined in
         * \STDW\Contract\Database\DatabaseConnectionInterface::list().
         *
         * @param string $resource
         * @param array<string, mixed> $where
         * @param array{limit?: int, offset?: int, order?: array<string, 'asc'|'desc'>} $options
         * @return array<int, array<string, mixed>>
         */
        public function search(string $resource, array $where, array $options = []): array;
    }