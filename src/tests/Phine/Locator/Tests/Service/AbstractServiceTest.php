<?php

namespace Phine\Locator\Tests\Service;

use Phine\Locator\Locator;
use Phine\Locator\Test\Service;
use PHPUnit_Framework_TestCase as TestCase;

/**
 * Tests the methods for the {@link AbstractService} class.
 *
 * @author Kevin Herrera <kevin@herrera.io>
 */
class AbstractServiceTest extends TestCase
{
    /**
     * The abstract service class to test.
     *
     * @var Service
     */
    private $service;

    /**
     * Make sure that we can set the locator.
     */
    public function testSetLocator()
    {
        $locator = new Locator();

        $this->service->setLocator($locator);

        $this->assertSame(
            $locator,
            get($this->service, 'locator'),
            'Make sure we can set the locator.'
        );
    }

    /**
     * Creates a new instance of {@link Service} to test.
     */
    protected function setUp()
    {
        $this->service = new Service();
    }
}
