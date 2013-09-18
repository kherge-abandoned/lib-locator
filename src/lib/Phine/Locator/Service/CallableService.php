<?php

namespace Phine\Locator\Service;

/**
 * Makes a callable a resolvable service.
 *
 * @author Kevin Herrera <kevin@herrera.io>
 */
class CallableService extends AbstractService implements ResolvableInterface
{
    /**
     * The callable for the service.
     *
     * @var callable
     */
    private $callable;

    /**
     * The flag used to determine if the callable should be invoked.
     *
     * @var boolean
     */
    private $invoke;

    /**
     * Sets the callable.
     *
     * The `$invoke` flag is used to determine if the given callable should
     * be called every time the `getResolvedValue()` method is called, or if
     * it should be returned instead. By setting it to `true` (the default),
     * the callable will be invoked.
     *
     * @param callable $callable The callable.
     * @param boolean  $invoke   Invoke the callable?
     */
    public function __construct($callable, $invoke = true)
    {
        $this->callable = $callable;
        $this->invoke = $invoke;
    }

    /**
     * {@inheritDoc}
     */
    public function getResolvedValue()
    {
        if ($this->invoke) {
            return call_user_func($this->callable, $this->locator);
        }

        return $this->callable;
    }
}
