<?php

namespace Phine\Locator\Test;

use Phine\Locator\Service\AbstractService;
use Phine\Locator\Service\ResolvableInterface;

/**
 * Generates a random number.
 *
 * @author Kevin Herrera <kevin@herrera.io>
 */
class RandomService extends AbstractService implements ResolvableInterface
{
    /**
     * {@inheritDoc}
     */
    public function getResolvedValue()
    {
        return rand();
    }
}
