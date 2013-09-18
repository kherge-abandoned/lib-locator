<?php

namespace Phine\Locator;

/**
 * Implemented by classes that depend on the service locator.
 *
 * @author Kevin Herrera <kevin@herrera.io>
 */
interface LocatorAwareInterface
{
    /**
     * Sets the service locator.
     *
     * @param LocatorInterface $locator The service locator.
     */
    public function setLocator(LocatorInterface $locator = null);
}
