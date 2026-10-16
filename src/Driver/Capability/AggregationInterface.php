<?php declare(strict_types=1);

    namespace STDW\Contract\Database\Driver\Capability;

    use STDW\Contract\Database\Aggregation\PipelineInterface;
    use STDW\Contract\Database\Resource\DatabaseResourceInterface;
    use STDW\Contract\Database\Result\ResultInterface;
    use STDW\Contract\Database\Exception\DriverExceptionInterface;


    /**
     * Optional: runs aggregations. Requires supportsAggregation().
     *
     * The pipeline is a neutral, driver-agnostic structure so the caller stays
     * portable across engines (SQL GROUP BY, MongoDB pipeline, in-memory for
     * flatfiles). It is not expressible over opaque HTTP APIs, hence elective.
     * The caller builds it with Aggregation\PipelineBuilderInterface.
     */
    interface AggregationInterface
    {
        /**
         * @param DatabaseResourceInterface $resource
         * @param PipelineInterface $pipeline
         * @return ResultInterface
         * @throws DriverExceptionInterface
         */
        public function aggregate(DatabaseResourceInterface $resource, PipelineInterface $pipeline): ResultInterface;
    }
