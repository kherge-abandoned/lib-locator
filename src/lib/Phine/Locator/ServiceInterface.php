<?php

namespace Phine\Locator;

/**
 * Defines how a service class must be implemented.
 *
 * @author Kevin Herrera <kevin@herrera.io>
 */
interface ServiceInterface
{
    /**
     * Sets the service locator.
     *
     * @param LocatorInterface $locator The service locator.
     */
    public function setLocator(LocatorInterface $locator);
}
