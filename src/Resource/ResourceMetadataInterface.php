<?php declare(strict_types=1);

    namespace STDW\Contract\Database\Resource;


    /**
     * Describes a resource schema.
     */
    interface ResourceMetadataInterface
    {
        /** @return array<int, string>
         */
        public function primaryKey(): array;

        /** @return array<string, string>
         */
        public function foreignKeys(): array;

        /** @return array<string, string>
         */
        public function fields(): array;
    }
