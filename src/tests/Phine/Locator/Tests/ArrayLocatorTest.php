<?php

namespace Phine\Locator\Tests;

use Phine\Locator\ArrayLocator;
use Phine\Locator\Test\ResolvableService;
use Phine\Locator\Test\Service;
use PHPUnit_Framework_TestCase as TestCase;

/**
 * Tests the methods for the {@link ArrayLocator} class.
 *
 * @author Kevin Herrera <kevin@herrera.io>
 */
class ArrayLocatorTest extends TestCase
{
    /**
     * The array locator to test.
     *
     * @var ArrayLocator
     */
    private $locator;

    /**
     * Make sure that we can check if a service is registered.
     */
    public function testOffsetExists()
    {
        $service = new Service();

        $this->locator->registerService('test', $service);

        $this->assertTrue(
            isset($this->locator['test']),
            'Make sure we receive true for "test".'
        );

        $this->assertFalse(
            isset($this->locator['another']),
            'Make sure we receive false for "another".'
        );
    }

    /**
     * Make sure that we can retrieve a registered service or its resolved value.
     */
    public function testOffsetGet()
    {
        $unresolved = new Service();

        $this->locator->registerService('unresolved', $unresolved);
        $this->locator->registerService('resolved', new ResolvableService());

        $this->assertSame(
            $unresolved,
            $this->locator['unresolved'],
            'Make sure we receive the service itself for "unresolved".'
        );

        $this->assertSame(
            123,
            $this->locator['resolved'],
            'Make sure we receive the resolved value for "resolved".'
        );
    }

    /**
     * Make sure that we can register and replace a service.
     */
    public function testOffsetSet()
    {
        $a = new Service();
        $b = new Service();

        $this->locator['test'] = $a;

        $this->assertSame($a, $this->locator->getservice('test'));

        $this->locator['test'] = $b;

        $this->assertSame($b, $this->locator->getservice('test'));
    }

    /**
     * Make sure that we can unregister a service without throwing an exception.
     */
    public function testOffsetUnset()
    {
        $this->locator->registerService('test', new Service());

        unset($this->locator['test']);

        $this->assertFalse($this->locator->isServiceRegistered('test'));

        unset($this->locator['test']);
    }

    /**
     * Creates a new instance of {@link ArrayLocator}.
     */
    protected function setUp()
    {
        $this->locator = new ArrayLocator();
    }
}
