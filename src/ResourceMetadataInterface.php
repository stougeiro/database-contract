<?php declare(strict_types=1);

    namespace STDW\Contract\Database;


    interface ResourceMetadataInterface
    {
        /** @return array
         */
        public function primaryKey(): array;

        /** @return array
         */
        public function fields(): array;

        /** @return array
         */
        public function types(): array;

        /** @return array
         */
        public function foreignKeys(): array;
    }