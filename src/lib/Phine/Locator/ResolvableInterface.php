<?php

namespace Phine\Locator;

/**
 * Defines how a resolvable service class must be implemented.
 *
 * @author Kevin Herrera <kevin@herrera.io>
 */
interface ResolvableInterface
{
    /**
     * Returns the value resolved by the service.
     *
     * @return mixed The resolved value.
     */
    public function getResolvedValue();
}
