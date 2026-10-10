<?php declare(strict_types=1);

    namespace STDW\Contract\Database;


    interface ResourceMetadataInterface
    {
        /**
         * Primary key fields (single or composite) for the resource.
         *
         * @return array<int, string>
         */
        public function primaryKey(): array;

        /**
         * Fields available on the resource.
         *
         * @return array<string, mixed>
         */
        public function fields(): array;

        /**
         * Field type mapping.
         *
         * @return array<string, mixed>
         */
        public function types(): array;

        /**
         * Local -> foreign key pairs (local => resource or foreign field).
         *
         * @return array<string, string>
         */
        public function foreignKeys(): array;
    }