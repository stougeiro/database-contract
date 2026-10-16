<?php declare(strict_types=1);

    namespace STDW\Contract\Database\Param;

    use STDW\Contract\Database\Param\Type\ParamType;


    interface ParamInterface
    {
        /** @return mixed 
         */
        public function value(): mixed;

        /** @return ParamType 
         */
        public function type(): ParamType;
    }
