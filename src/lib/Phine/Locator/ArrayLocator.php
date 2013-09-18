<?php

namespace Phine\Locator;

/**
 * An array accessible service locator.
 *
 * @author Kevin Herrera <kevin@herrera.io>
 */
class ArrayLocator extends Locator implements ArrayLocatorInterface
{
    /**
     * {@inheritDoc}
     */
    public function offsetExists($id)
    {
        return $this->isServiceRegistered($id);
    }

    /**
     * {@inheritDoc}
     */
    public function offsetGet($id)
    {
        if ($this->isServiceRegistered($id)
            && $this->isServiceResolvable($id)) {
            return $this->resolveService($id);
        }

        return $this->getService($id);
    }

    /**
     * {@inheritDoc}
     */
    public function offsetSet($id, $service)
    {
        if ($this->isServiceRegistered($id)) {
            $this->replaceService($id, $service);
        } else {
            $this->registerService($id, $service);
        }
    }

    /**
     * {@inheritDoc}
     */
    public function offsetUnset($id)
    {
        if ($this->isServiceRegistered($id)) {
            $this->unregisterService($id);
        }
    }
}
