<?php

namespace Phine\Locator;

use Phine\Locator\Exception\LocatorException;
use Phine\Locator\Service\ServiceInterface;

/**
 * Defines how a service locator class must be implemented.
 *
 * @author Kevin Herrera <kevin@herrera.io>
 */
interface LocatorInterface
{
    /**
     * Returns the service registered with the unique identifier.
     *
     * @param string $id The unique identifier.
     *
     * @return ServiceInterface The registered service.
     */
    public function getService($id);

    /**
     * Returns the unique identifier for the registered service.
     *
     * If the service is registered multiple times under different keys, only
     * the first key found will be returned. If `$first` is set to false, all
     * found keys will be returned instead.
     *
     * @param ServiceInterface $service The registered service.
     * @param boolean          $first   Only return first identifier?
     *
     * @return array|string The unique identifier(s).
     *
     * @throws LocatorException If the service is not registered.
     */
    public function getServiceId(ServiceInterface $service, $first = true);

    /**
     * Checks if a service is registered with the unique identifier.
     *
     * @param string $id The unique identifier.
     *
     * @return boolean Returns `true` if it is registered, `false` if not.
     */
    public function isServiceRegistered($id);

    /**
     * Checks if a service is resolvable.
     *
     * @param string $id The unique identifier.
     *
     * @return boolean Returns `true` if it is resolvable, `false` if not.
     *
     * @throws LocatorException If the unique identifier is not in use.
     */
    public function isServiceResolvable($id);

    /**
     * Unregisters a service with the unique identifier.
     *
     * @param string $id The unique identifier.
     *
     * @throws LocatorException If the unique identifier is not in use.
     */
    public function unregisterService($id);

    /**
     * Registers a service with the unique identifier.
     *
     * @param string           $id      The unique identifier.
     * @param ServiceInterface $service The service.
     *
     * @throws LocatorException If the unique identifier is already in use.
     */
    public function registerService($id, ServiceInterface $service);

    /**
     * Replaces the service registered with the unique identifier.
     *
     * @param string           $id      The unique identifier.
     * @param ServiceInterface $service The service.
     *
     * @throws LocatorException If the unique identifier is not in use.
     */
    public function replaceService($id, ServiceInterface $service);

    /**
     * Resolves a {@link ResolvableInterface} service and returns the value.
     *
     * @param string $id The unique identifier.
     *
     * @return mixed The service resolved value.
     *
     * @throws LocatorException If the service is not resolvable.
     */
    public function resolveService($id);
}
