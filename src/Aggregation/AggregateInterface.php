<?php declare(strict_types=1);

    namespace STDW\Contract\Database\Aggregation;

    use STDW\Contract\Database\Aggregation\Type\AggregateFunction;


    /**
     * A single aggregation projection: one function over one input column,
     * exposed under an output alias.
     */
    interface AggregateInterface
    {
        /** @return string
         */
        public function alias(): string;

        /** @return AggregateFunction
         */
        public function operation(): AggregateFunction;

        /**
         * Input column. Use "*" for count(*) when no column applies.
         *
         * @return string
         */
        public function column(): string;
    }
