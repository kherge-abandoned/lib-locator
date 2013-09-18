<?php

namespace Phine\Locator;

use ArrayAccess;
use Phine\Locator\Service\ServiceInterface;

/**
 * Defines how an array accessible service locator class must be implemented.
 *
 * @author Kevin Herrera <kevin@herrera.io>
 */
interface ArrayLocatorInterface extends ArrayAccess, LocatorInterface
{
    /**
     * @see LocatorInterface::isServiceRegistered
     */
    public function offsetExists($id);

    /**
     * Returns the service with the unique identifier, or its resolved value.
     *
     * The service with the unique identifier will be returned unless the
     * service is an instance of {@link ResolvableInterface}. If the service
     * is an implementation of the interface, the resolved value will be
     * returned instead.
     *
     * @param string $id The unique identifier.
     *
     * @return ServiceInterface|mixed The service or resolved value.
     *
     * @see LocatorInterface::isServiceResolvable
     * @see LocatorInterface::getService
     * @see LocatorInterface::resolveService
     */
    public function offsetGet($id);

    /**
     * Registers or replaces a service with the unique identifier.
     *
     * The service will be registered with the given unique identifier. If
     * a service is already registered with the unique identifier, it will
     * be replaced. No exception will be thrown for using a unique identifier
     * that is already registered with the service locator.
     *
     * @param string           $id      The unique identifier.
     * @param ServiceInterface $service The service.
     *
     * @see LocatorInterface::isServiceRegistered
     * @see LocatorInterface::registerService
     * @see LocatorInterface::replaceService
     */
    public function offsetSet($id, $service);

    /**
     * Unregisters the service with the unique identifier, if registered.
     *
     * If a service is registered with the unique identifier, it will be
     * unregistered from the service locator. If a service is not registered,
     * an exception will not be thrown as if directly calling the
     * {@link LocatorInterface::unregisterService} method.
     *
     * @param string $id The unique identifier.
     *
     * @see LocatorInterface::isServiceRegistered
     * @see LocatorInterface::unregisterService
     */
    public function offsetUnset($id);
}
