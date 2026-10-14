<?php declare(strict_types=1);

    namespace STDW\Contract\Database\Model;


    /**
     * Exposes the schema description of a resource: primary keys,
     * fields, types and foreign keys.
     */
    interface ResourceMetadataAwareInterface
    {
        /** @return ResourceMetadataInterface
         */
        public function metadata(): ResourceMetadataInterface;
    }
