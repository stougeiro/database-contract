<?php declare(strict_types=1);

    namespace STDW\Contract\Database\SQT;


    /**
     * Represents pagination parameters.
     */
    interface PaginationNodeInterface
    {
        /** @return null|int 
         */
        public function limit(): ?int;

        /** @return null|int 
         */
        public function offset(): ?int;

        /** @return null|int 
         */
        public function page(): ?int;

        /** @return null|int 
         */
        public function perPage(): ?int;

        /** @return mixed 
         */
        public function cursor(): mixed;
    }
