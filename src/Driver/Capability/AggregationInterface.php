<?php declare(strict_types=1);

    namespace STDW\Contract\Database\Driver\Capability;

    use STDW\Contract\Database\Resource\DatabaseResourceInterface;
    use STDW\Contract\Database\Result\ResultInterface;
    use STDW\Contract\Database\QueryTree\Types\OrderDirection;
    use STDW\Contract\Database\Driver\DatabaseDriverInterface;
    use STDW\Contract\Database\Exception\DriverExceptionInterface;


    /**
     * Optional: runs aggregations. Requires supportsAggregation().
     *
     * The aggregation follows a neutral, driver-agnostic shape so the caller
     * stays portable across engines (SQL GROUP BY, MongoDB pipeline, in-memory
     * for flatfiles, endpoint params for APIs). Drivers that cannot honor a
     * neutral stage return an empty result rather than throwing. The "native"
     * key is an engine-specific escape hatch for pipelines the neutral shape
     * cannot express; it is defined entirely by the driver.
     *
     * Neutral grammar:
     * - where / having: reuse the Filter of DatabaseDriverInterface.
     * - groupBy: list of column keys; drivers may derive period keys
     *   (e.g. month/year/day/hour) from date columns.
     * - aggregate: map of output column => [function, input column];
     *   function is one of count, sum, avg, min, max.
     * - order: map of column => OrderDirection.
     *
     * @phpstan-import-type Filter from DatabaseDriverInterface
     * @phpstan-type Aggregation array{
     *   where?: Filter,
     *   groupBy?: array<int, string>,
     *   aggregate?: array<string, array{string, string}>,
     *   having?: Filter,
     *   order?: array<string, OrderDirection>,
     *   limit?: int,
     *   native?: array<int, mixed>
     * }
     */
    interface AggregationInterface
    {
        /**
         * @param DatabaseResourceInterface $resource
         * @param Aggregation $pipeline
         * @return ResultInterface
         * @throws DriverExceptionInterface
         */
        public function aggregate(DatabaseResourceInterface $resource, array $pipeline): ResultInterface;
    }
