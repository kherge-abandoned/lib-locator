<?php

namespace Phine\Locator\Service;

use Phine\Locator\Exception\ServiceException;

/**
 * Protects the value of a resolvable service.
 *
 * @author Kevin Herrera <kevin@herrera.io>
 */
class ProtectedResolvableService extends AbstractService implements ResolvableInterface
{
    /**
     * The resolvable service.
     *
     * @var ServiceInterface|ResolvableInterface
     */
    private $service;

    /**
     * The resolved value.
     *
     * @var mixed
     */
    private $value;

    /**
     * Sets the resolvable service.
     *
     * @param ServiceInterface $service The resolvable service.
     *
     * @throws ServiceException If the service is not resolvable.
     */
    public function __construct(ServiceInterface $service)
    {
        if (!($service instanceof ResolvableInterface)) {
            throw new ServiceException(
                'The service is not resolvable (instance of ResolvableInterface).'
            );
        }

        $this->service = $service;
    }

    /**
     * Returns the value resolved by the service.
     *
     * The value returned by the protected service will be cached for the
     * life of the instance. All subsequent calls made to this method will
     * return the cached resolved value.
     *
     * @return mixed The resolved value.
     */
    public function getResolvedValue()
    {
        if (null === $this->value) {
            $this->value = $this->service->getResolvedValue();
        }

        return $this->value;
    }
}
