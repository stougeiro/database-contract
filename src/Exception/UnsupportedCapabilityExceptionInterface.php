<?php declare(strict_types=1);

    namespace STDW\Contract\Database\Exception;


    /**
     * Thrown when an elective capability or aspect is requested but the driver
     * does not support it (see DriverCapabilitiesInterface). Lets callers
     * distinguish an unsupported-capability failure from a generic driver
     * error.
     */
    interface UnsupportedCapabilityExceptionInterface extends DriverExceptionInterface
    { }
