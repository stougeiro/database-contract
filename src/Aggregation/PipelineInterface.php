<?php declare(strict_types=1);

    namespace STDW\Contract\Database\Aggregation;

    use STDW\Contract\Database\QueryTree\Node\GroupNodeInterface;
    use STDW\Contract\Database\QueryTree\Node\OrderNodeInterface;


    /**
     * A neutral aggregation pipeline: filter, group, project aggregates,
     * filter groups, order and limit. Drivers translate it to their native
     * form (SQL GROUP BY, MongoDB pipeline, in-memory for flatfiles).
     * Callers build it with PipelineBuilderInterface.
     */
    interface PipelineInterface
    {
        /** @return null|GroupNodeInterface
         */
        public function where(): ?GroupNodeInterface;

        /** @return array<int, string>
         */
        public function groupBy(): array;

        /** @return array<int, AggregateInterface>
         */
        public function aggregate(): array;

        /** @return null|GroupNodeInterface
         */
        public function having(): ?GroupNodeInterface;

        /** @return array<int, OrderNodeInterface>
         */
        public function order(): array;

        /** @return null|int
         */
        public function limit(): ?int;
    }
