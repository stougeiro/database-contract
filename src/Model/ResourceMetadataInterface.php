<?php declare(strict_types=1);

    namespace STDW\Contract\Database\Model;


    /** Describes a resource's schema: primary key, fields, types and foreign keys.
     */
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
         * Field type mapping. Recommended vocabulary per field:
         * int, float, string, bool, datetime.
         *
         * @return array<string, string>
         */
        public function types(): array;

        /**
         * Local -> foreign key pairs. Each value is the canonical reference
         * string "resource.field".
         *
         * @return array<string, string>
         */
        public function foreignKeys(): array;
    }