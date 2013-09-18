<?php

namespace Phine\Locator\Test;

use Phine\Locator\AbstractService;
use Phine\Locator\LocatorInterface;

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
