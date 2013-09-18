<?php

namespace Phine\Locator;

use Phine\Locator\Exception\LocatorException;
use Phine\Locator\Service\ResolvableInterface;
use Phine\Locator\Service\ServiceInterface;

/**
 * A service locator.
 *
 * @author Kevin Herrera <kevin@herrera.io>
 */
class Locator implements LocatorInterface
{
    /**
     * The registered services.
     *
     * @var ServiceInterface[]|ResolvableInterface[]
     */
    private $services = array();

    /**
     * {@inheritDoc}
     */
    public function getService($id)
    {
        if (!isset($this->services[$id])) {
            throw LocatorException::idNotUsed($id);
        }

        return $this->services[$id];
    }

    /**
     * {@inheritDoc}
     */
    public function isServiceRegistered($id)
    {
        return isset($this->services[$id]);
    }

    /**
     * {@inheritDoc}
     */
    public function isServiceResolvable($id)
    {
        if (!isset($this->services[$id])) {
            throw LocatorException::idNotUsed($id);
        }

        return ($this->services[$id] instanceof ResolvableInterface);
    }

    /**
     * {@inheritDoc}
     */
    public function unregisterService($id)
    {
        if (!isset($this->services[$id])) {
            throw LocatorException::idNotUsed($id);
        }

        unset($this->services[$id]);
    }

    /**
     * {@inheritDoc}
     */
    public function registerService($id, ServiceInterface $service)
    {
        if (isset($this->services[$id])) {
            throw LocatorException::idUsed($id);
        }

        $service->setLocator($this);

        $this->services[$id] = $service;
    }

    /**
     * {@inheritDoc}
     */
    public function replaceService($id, ServiceInterface $service)
    {
        if (!isset($this->services[$id])) {
            throw LocatorException::idNotUsed($id);
        }

        $service->setLocator($this);

        $this->services[$id] = $service;
    }

    /**
     * {@inheritDoc}
     */
    public function resolveService($id)
    {
        if (!isset($this->services[$id])) {
            throw LocatorException::idNotUsed($id);
        }

        if (!($this->services[$id] instanceof ResolvableInterface)) {
            throw LocatorException::idNotResolvable($id);
        }

        return $this->services[$id]->getResolvedValue();
    }
}
