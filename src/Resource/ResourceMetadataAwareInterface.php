<?php declare(strict_types=1);

    namespace STDW\Contract\Database\Resource;


    /**
     * Exposes the schema of a resource.
     */
    interface ResourceMetadataAwareInterface
    {
        public function metadata(): ResourceMetadataInterface;
    }
