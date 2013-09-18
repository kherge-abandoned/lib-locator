<?php

namespace Phine\Locator;

/**
 * A basic implementation of {@link ServiceInterface}.
 *
 * @author Kevin Herrera <kevin@herrera.io>
 */
abstract class AbstractService implements ServiceInterface
{
    /**
     * The service locator.
     *
     * @var LocatorInterface
     */
    protected $locator;

    /**
     * {@inheritDoc}
     */
    public function setLocator(LocatorInterface $locator)
    {
        $this->locator = $locator;
    }
}
