<?php

namespace Phine\Locator\Test;

use Phine\Locator\Service\AbstractService;
use Phine\Locator\Service\ResolvableInterface;

/**
 * An example resolvable service.
 *
 * @author Kevin Herrera <kevin@herrera.io>
 */
class ResolvableService extends AbstractService implements ResolvableInterface
{
    /**
     * {@inheritDoc}
     */
    public function getResolvedValue()
    {
        return 123;
    }
}
