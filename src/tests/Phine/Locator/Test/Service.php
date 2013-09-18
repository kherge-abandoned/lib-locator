<?php

namespace Phine\Locator\Test;

use Phine\Locator\LocatorInterface;
use Phine\Locator\Service\AbstractService;

/**
 * An example service.
 *
 * @author Kevin Herrera <kevin@herrera.io>
 */
class Service extends AbstractService
{
    /**
     * The service locator, made public.
     *
     * @var LocatorInterface
     */
    public $locator;
}
