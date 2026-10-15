<?php declare(strict_types=1);

    namespace STDW\Contract\Database\Param;

    use Stringable;
    use STDW\Contract\Database\Param\Types\ParamType;


    interface ParamInterface extends Stringable
    {
        /** @return mixed 
         */
        public function value(): mixed;

        /** @return ParamType 
         */
        public function type(): ParamType;

        /** @return string 
         */
        public function __toString(): string;
    }
