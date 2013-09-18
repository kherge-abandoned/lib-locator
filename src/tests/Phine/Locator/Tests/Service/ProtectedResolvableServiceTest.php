<?php

namespace Phine\Locator\Tests\Service;

use Phine\Locator\Service\ProtectedResolvableService;
use Phine\Locator\Test\RandomService;
use Phine\Locator\Test\Service;
use PHPUnit_Framework_TestCase as TestCase;

/**
 * Tests the methods for the {@link ProtectedResolvableService} class.
 *
 * @author Kevin Herrera <kevin@herrera.io>
 */
class ProtectedResolvableServiceTest extends TestCase
{
    /**
     * Make sure we can set the service.
     */
    public function testConstruct()
    {
        $service = new RandomService();
        $protected = new ProtectedResolvableService($service);

        $this->assertSame(
            $service,
            get($protected, 'service'),
            'Make sure we can set the service.'
        );
    }

    /**
     * Make sure it only accepts resolvable services.
     */
    public function testConstructNotResolvable()
    {
        $this->setExpectedException(
            'Phine\\Locator\\Exception\\ServiceException',
            'The service is not resolvable (instance of ResolvableInterface).'
        );

        new ProtectedResolvableService(new Service());
    }

    /**
     * Make sure the resolved value is protected.
     */
    public function testGetResolvedValue()
    {
        $service = new RandomService();
        $protected = new ProtectedResolvableService($service);

        $this->assertSame(
            $protected->getResolvedValue(),
            $protected->getResolvedValue(),
            'Make sure that the return value of getResolvedValue() does not change.'
        );
    }
}
