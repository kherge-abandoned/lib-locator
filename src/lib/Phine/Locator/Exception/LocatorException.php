<?php

namespace Phine\Locator\Exception;

use Phine\Exception\Exception;

/**
 * Exception thrown for problems with a locator.
 *
 * @author Kevin Herrera <kevin@herrera.io>
 */
class LocatorException extends Exception
{
    /**
     * Creates an exception for an unresolvable service unique identifier.
     *
     * @param string $id The unique identifier.
     *
     * @return LocatorException The new exception.
     */
    public static function idNotResolvable($id)
    {
        return self::createUsingFormat(
            'The "%s" service is not resolvable.',
            $id
        );
    }

    /**
     * Creates an exception for an unused service unique identifier.
     *
     * @param string $id The unique identifier.
     *
     * @return LocatorException The new exception.
     */
    public static function idNotUsed($id)
    {
        return self::createUsingFormat(
            'The "%s" service unique identifier is not in use.',
            $id
        );
    }

    /**
     * Creates an exception for a service unique identifier already in use.
     *
     * @param string $id The unique identifier.
     *
     * @return LocatorException The new exception.
     */
    public static function idUsed($id)
    {
        return self::createUsingFormat(
            'The "%s" service unique identifier is already in use.',
            $id
        );
    }

    /**
     * Creates an exception for a service that is not registered.
     *
     * @return LocatorException The new exception.
     */
    public static function notRegistered()
    {
        return new self(
            'The service is not registered.'
        );
    }
}
