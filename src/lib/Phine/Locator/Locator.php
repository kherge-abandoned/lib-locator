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
    private $services;

    /**
     * {@inheritDoc}
     */
    public function getService($id)
    {
        if (!isset($this->services[$id])) {
            throw LocatorException::createUsingFormat(
                'The "%s" service unique identifier is not in use.',
                $id
            );
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
            throw LocatorException::createUsingFormat(
                'The "%s" service unique identifier is not in use.',
                $id
            );
        }

        return ($this->services[$id] instanceof ResolvableInterface);
    }

    /**
     * {@inheritDoc}
     */
    public function unregisterService($id)
    {
        if (!isset($this->services[$id])) {
            throw LocatorException::createUsingFormat(
                'The "%s" service unique identifier is not in use.',
                $id
            );
        }

        unset($this->services[$id]);
    }

    /**
     * {@inheritDoc}
     */
    public function registerService($id, ServiceInterface $service)
    {
        if (isset($this->services[$id])) {
            throw LocatorException::createUsingFormat(
                'The "%s" service unique identifier is already in use.',
                $id
            );
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
            throw LocatorException::createUsingFormat(
                'The "%s" service unique identifier is not in use.',
                $id
            );
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
            throw LocatorException::createUsingFormat(
                'The "%s" service unique identifier is not in use.',
                $id
            );
        }

        if (!($this->services[$id] instanceof ResolvableInterface)) {
            throw LocatorException::createUsingFormat(
                'The "%s" service is not resolvable.',
                $id
            );
        }

        return $this->services[$id]->getResolvedValue();
    }
}
