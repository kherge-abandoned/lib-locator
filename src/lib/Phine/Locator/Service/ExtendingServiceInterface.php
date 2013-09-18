<?php

namespace Phine\Locator\Service;

/**
 * Defines how a service class extending another must be implemented.
 *
 * If a service class exists to extend another, it is strongly encouraged that
 * this interface be implemented. It will allow other services to identify an
 * extended service, as well as make it possible to retrieve the service that
 * is being extended.
 *
 * @author Kevin Herrera <kevin@herrera.io>
 */
interface ExtendingServiceInterface extends ServiceInterface
{
    /**
     * Returns the service that is being extended.
     *
     * @return ServiceInterface The extended service.
     */
    public function getExtendedService();
}
