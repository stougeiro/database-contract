<?php declare(strict_types=1);

    namespace STDW\Contract\Database\Result;


    interface ResultInterface
    {
        /** @return null|array<int|string, mixed>|object
         */
        public function data(): null|array|object;
        
        /** @return int 
         */
        public function count(): int;

        /** @return bool 
         */
        public function isValid(): bool;
    }
