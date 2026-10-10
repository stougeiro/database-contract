<?php declare(strict_types=1);

    namespace STDW\Contract\Database\Capability;


    interface SearchInterface
    {
        /**
         * Lists records filtered on demand by matching/indexed text semantics
         * (drivers must support search, per supportsSearch(), for this to be
         * honored). When the underlying resource does not support the driver's
         * search semantics, the driver throws a clear exception.
         * Canonical options:
         *   - limit: int
         *   - offset: int
         *   - order: array<string, 'asc'|'desc'>
         *
         * @param string $resource
         * @param array<string, mixed> $query
         * @param array{limit?: int, offset?: int, order?: array<string, 'asc'|'desc'>} $options
         * @return array<int, array<string, mixed>>
         */
        public function search(string $resource, array $query, array $options = []): array;
    }