<?php

namespace Phine\Locator\Tests\Service;

use Phine\Locator\Locator;
use Phine\Locator\LocatorInterface;
use Phine\Locator\Service\CallableService;
use PHPUnit_Framework_TestCase as TestCase;

/**
 * Tests the methods for the {@link CallableService} class.
 *
 * @author Kevin Herrera <kevin@herrera.io>
 */
class CallableServiceTest extends TestCase
{
    /**
     * Make sure that we can set the callable and invoke flag.
     */
    public function testConstruct()
    {
        $callable = function () {
        };

        $service = new CallableService($callable, false);

        $this->assertSame(
            $callable,
            get($service, 'callable'),
            'Make sure we can set the callable.'
        );

        $this->assertFalse(
            get($service, 'invoke'),
            'Make sure we can set the invoke flag.'
        );
    }

    /**
     * Make sure that only valid callables are given.
     */
    public function testConstructInvalidCallable()
    {
        $this->setExpectedException(
            'Phine\\Locator\\Exception\\ServiceException',
            'The callable is not valid.'
        );

        new CallableService(123);
    }

    /**
     * Make sure that the callable is invoked.
     */
    public function testGetResolvedValue()
    {
        $_this = $this;
        $locator = new Locator();

        $service = new CallableService(
            function (LocatorInterface $actual) use ($_this, $locator) {
                $_this->assertSame(
                    $locator,
                    $actual,
                    'Make sure that the callable gets the service locator.'
                );

                return rand();
            }
        );

        $locator->registerService('test', $service);

        $rand = $service->getResolvedValue();

        $this->assertNotSame(
            $rand,
            $service->getResolvedValue(),
            'Make sure that we can invoke the callable multiple times.'
        );
    }

    /**
     * Make sure that the callable is not invoked.
     */
    public function testGetResolvedValueNotInvoked()
    {
        $callable = function () {
        };

        $service = new CallableService($callable, false);

        $this->assertSame(
            $callable,
            $service->getResolvedValue(),
            'Make sure that the callable is returned and not invoked.'
        );
    }
}
