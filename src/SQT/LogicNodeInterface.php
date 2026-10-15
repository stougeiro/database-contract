<?php declare(strict_types=1);

    namespace STDW\Contract\Database\SQT;


    /**
     * Represents a logical grouping of nodes (AND/OR/NOT).
     */
    interface LogicNodeInterface
    {
        /** @return null|LogicOperator 
         */
        public function operator(): ?LogicOperator;
    }
