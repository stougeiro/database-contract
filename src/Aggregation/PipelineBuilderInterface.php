<?php declare(strict_types=1);

    namespace STDW\Contract\Database\Aggregation;

    use STDW\Contract\Database\QueryTree\QueryTreeBuilderInterface;
    use STDW\Contract\Database\Exception\QueryTreeExceptionInterface;


    /**
     * Builds a neutral aggregation pipeline from a declarative array DSL.
     *
     * The DSL is the caller-facing surface; it lowers to PipelineInterface.
     * Drivers never see the arrays, only the pipeline.
     *
     * Grammar:
     * - where / having: a Filter (see QueryTreeBuilderInterface);
     * - groupBy: list of column keys;
     * - aggregate: list of {alias, function, column}; function follows
     *   AggregateFunction (case-insensitive), column may be "*" for count;
     * - order: an Order (see QueryTreeBuilderInterface);
     * - limit: int.
     *
     * @phpstan-import-type Filter from QueryTreeBuilderInterface
     * @phpstan-import-type Order from QueryTreeBuilderInterface
     * @phpstan-type AggregateSpec array{alias: string, function: string, column: string}
     * @phpstan-type Pipeline array{
     *   where?: Filter,
     *   groupBy?: array<int, string>,
     *   aggregate?: array<int, AggregateSpec>,
     *   having?: Filter,
     *   order?: Order,
     *   limit?: int
     * }
     */
    interface PipelineBuilderInterface
    {
        /**
         * @param Pipeline $pipeline
         * @return PipelineInterface
         * @throws QueryTreeExceptionInterface
         */
        public static function make(array $pipeline): PipelineInterface;
    }
