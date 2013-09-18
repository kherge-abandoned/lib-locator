<?php

namespace Phine\Locator\Tests;

use Phine\Locator\Locator;
use Phine\Locator\Test\ResolvableService;
use Phine\Locator\Test\Service;
use PHPUnit_Framework_TestCase as TestCase;

/**
 * Tests the methods for the {@link Locator} class.
 *
 * @author Kevin Herrera <kevin@herrera.io>
 */
class LocatorTest extends TestCase
{
    /**
     * The service locator locator being tested.
     *
     * @var Locator
     */
    private $locator;

    /**
     * Make sure that we can retrieve the same service that is registered.
     */
    public function testGetService()
    {
        $service = new Service();

        set($this->locator, 'services', array('test' => $service));

        $this->assertSame(
            $service,
            $this->locator->getService('test'),
            'Make sure the service we get is identical.'
        );
    }

    /**
     * Make sure that an exception is thrown if the service is not registered.
     */
    public function testGetServiceNotRegistered()
    {
        $this->setExpectedException(
            'Phine\\Locator\\Exception\\LocatorException',
            'The "test" service unique identifier is not in use.'
        );

        $this->locator->getService('test');
    }

    /**
     * Make sure that we can check if a service is registered or not.
     */
    public function testIsServiceRegistered()
    {
        $this->assertFalse($this->locator->isServiceRegistered('test'));

        $service = new Service();

        set($this->locator, 'services', array('test' => $service));

        $this->assertTrue(
            $this->locator->isServiceRegistered('test'),
            'Make sure isServiceRegistered() returns true for "test".'
        );
    }

    /**
     * Make sure that we can check if a service is resolvable.
     */
    public function testIsServiceResolvable()
    {
        set(
            $this->locator,
            'services',
            array(
                'a' => new Service(),
                'b' => new ResolvableService(),
            )
        );

        $this->assertFalse(
            $this->locator->isServiceResolvable('a'),
            'Make sure isServiceResolvable() returns false for "a".'
        );

        $this->assertTrue(
            $this->locator->isServiceResolvable('b'),
            'Make sure isServiceResolvable() returns true for "b".'
        );
    }

    /**
     * Make sure that an exception is thrown if the service is not registered.
     */
    public function testIsServiceResolvableNotRegistered()
    {
        $this->setExpectedException(
            'Phine\\Locator\\Exception\\LocatorException',
            'The "test" service unique identifier is not in use.'
        );

        $this->locator->isServiceResolvable('test');
    }

    /**
     * Make sure that we can unregister a registered service.
     */
    public function testUnregisterService()
    {
        set($this->locator, 'services', array('test' => new Service()));

        $this->locator->unregisterService('test');

        $this->assertSame(
            array(),
            get($this->locator, 'services'),
            'Make sure that the "test" service is unregistered.'
        );
    }

    /**
     * Make sure an exception is thrown if the service is not registered.
     *
     * Yes, I know it may seem ridiculous for spewing an exception if we
     * want to remove something that does not exist, but this could clue
     * in some developers that there is a problem with their logic.
     */
    public function testUnregisterServiceNotRegistered()
    {
        $this->setExpectedException(
            'Phine\\Locator\\Exception\\LocatorException',
            'The "test" service unique identifier is not in use.'
        );

        $this->locator->unregisterService('test');
    }

    /**
     * Make sure that we can register a new service.
     */
    public function testRegisterService()
    {
        $service = new Service();

        $this->locator->registerService('test', $service);

        $this->assertSame(
            array('test' => $service),
            get($this->locator, 'services'),
            'Make sure that the "test" service is registered.'
        );

        $this->assertSame(
            $this->locator,
            $service->locator,
            'Make sure the locator is passed on to the service.'
        );
    }

    /**
     * Make sure that an exception is thrown for re-used unique identifiers.
     */
    public function testRegisterServiceDuplicateId()
    {
        $service = new Service();

        $this->locator->registerService('test', $service);

        $this->setExpectedException(
            'Phine\\Locator\\Exception\\LocatorException',
            'The "test" service unique identifier is already in use.'
        );

        $this->locator->registerService('test', $service);
    }

    /**
     * Make sure that we can replace an existing service.
     */
    public function testReplaceService()
    {
        set($this->locator, 'services', array('test' => new Service()));

        $service = new Service();

        $this->locator->replaceService('test', $service);

        $this->assertSame(
            array('test' => $service),
            get($this->locator, 'services'),
            'Make sure that the "test" service is replaced.'
        );

        $this->assertSame(
            $this->locator,
            $service->locator,
            'Make sure the locator is passed on to the replacement service.'
        );
    }

    /**
     * Make sure that an exception is thrown if the service is not registered.
     */
    public function testReplaceServiceNotRegistered()
    {
        $service = new Service();

        $this->setExpectedException(
            'Phine\\Locator\\Exception\\LocatorException',
            'The "test" service unique identifier is not in use.'
        );

        $this->locator->replaceService('test', $service);
    }

    /**
     * Make sure that services are properly resolved.
     */
    public function testResolveService()
    {
        set(
            $this->locator,
            'services',
            array('test' => new ResolvableService())
        );

        $this->assertSame(123, $this->locator->resolveService('test'));
    }

    /**
     * Make sure that an exception is thrown if the service is not registered.
     */
    public function testResolveServiceNotRegistered()
    {
        $service = new ResolvableService();

        $this->setExpectedException(
            'Phine\\Locator\\Exception\\LocatorException',
            'The "test" service unique identifier is not in use.'
        );

        $this->locator->resolveService('test', $service);
    }

    /**
     * Make sure that an exception is thrown if the service is not resolvable.
     */
    public function testResolveServiceNotResolvable()
    {
        set(
            $this->locator,
            'services',
            array('test' => new Service())
        );

        $this->setExpectedException(
            'Phine\\Locator\\Exception\\LocatorException',
            'The "test" service is not resolvable.'
        );

        $this->locator->resolveService('test');
    }

    /**
     * Creates the {@link Locator} instance for testing.
     */
    protected function setUp()
    {
        $this->locator = new Locator();
    }
}
