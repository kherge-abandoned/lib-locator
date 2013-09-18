<?php

namespace Phine\Locator\Tests\Service;

use Phine\Locator\Locator;
use Phine\Locator\Service\DataService;
use PHPUnit_Framework_TestCase as TestCase;

/**
 * Tests the methods for the {@link DataService} class.
 *
 * @author Kevin Herrera <kevin@herrera.io>
 */
class DataServiceTest extends TestCase
{
    /**
     * The data service to test.
     *
     * @var DataService
     */
    private $data;

    /**
     * Make sure that we can get the locator.
     */
    public function testGetLocator()
    {
        $locator = new Locator();

        set($this->data, 'locator', $locator);

        $this->assertSame(
            $locator,
            $this->data->getLocator(),
            'Make sure that we can retrieve the locator.'
        );
    }

    /**
     * Make sure that we can set the locator.
     */
    public function testSetLocator()
    {
        $locator = new Locator();

        $this->data->setLocator($locator);

        $this->assertSame(
            $locator,
            get($this->data, 'locator'),
            'Make sure that we can set the locator.'
        );
    }

    /**
     * Creates a new instance of {@link DataService}.
     */
    protected function setUp()
    {
        $this->data = new DataService();
    }
}
