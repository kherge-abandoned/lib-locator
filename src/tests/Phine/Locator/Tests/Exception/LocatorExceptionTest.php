<?php

namespace Phine\Locator\Tests\Exception;

use Phine\Locator\Exception\LocatorException;
use PHPUnit_Framework_TestCase as TestCase;

/**
 * Tests the methods for the {@link LocatorException} class.
 *
 * @author Kevin Herrera <kevin@herrera.io>
 */
class LocatorExceptionTest extends TestCase
{
    /**
     * Make sure that the message is formatted properly.
     */
    public function testIdNotResolvable()
    {
        $exception = LocatorException::idNotResolvable('test');

        $this->assertEquals(
            'The "test" service is not resolvable.',
            $exception->getMessage(),
            'Make sure the message is formatted properly.'
        );
    }

    /**
     * Make sure that the message is formatted properly.
     */
    public function testIdNotUsed()
    {
        $exception = LocatorException::idNotUsed('test');

        $this->assertEquals(
            'The "test" service unique identifier is not in use.',
            $exception->getMessage(),
            'Make sure the message is formatted properly.'
        );
    }

    /**
     * Make sure that the message is formatted properly.
     */
    public function testIdUsed()
    {
        $exception = LocatorException::idUsed('test');

        $this->assertEquals(
            'The "test" service unique identifier is already in use.',
            $exception->getMessage(),
            'Make sure the message is formatted properly.'
        );
    }
}
