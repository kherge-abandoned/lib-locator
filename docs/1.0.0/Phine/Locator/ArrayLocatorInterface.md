<small>Phine\Locator</small>

ArrayLocatorInterface
=====================

Defines how an array accessible service locator class must be implemented.

Signature
---------

- It is a(n) **interface**.
- It implements the following interfaces:
    - [`ArrayAccess`](http://php.net/class.ArrayAccess)
    - [`Phine\Locator\LocatorInterface`](../../Phine/Locator/LocatorInterface.md) &mdash; Defines how a service locator class must be implemented.

Methods
-------

The interface defines the following methods:

- [`offsetExists()`](#offsetExists)
- [`offsetGet()`](#offsetGet) &mdash; Returns the service with the unique identifier, or its resolved value.
- [`offsetSet()`](#offsetSet) &mdash; Registers or replaces a service with the unique identifier.
- [`offsetUnset()`](#offsetUnset) &mdash; Unregisters the service with the unique identifier, if registered.

### `offsetExists()` <a name="offsetExists"></a>

#### See Also

- `LocatorInterface::isServiceRegistered`

#### Signature

- It is a **public** method.
- It accepts the following parameter(s):
    - `$id`
- It does not return anything.

### `offsetGet()` <a name="offsetGet"></a>

Returns the service with the unique identifier, or its resolved value.

#### Description

The service with the unique identifier will be returned unless the
service is an instance of {@link ResolvableInterface}. If the service
is an implementation of the interface, the resolved value will be
returned instead.

#### See Also

- `LocatorInterface::isServiceResolvable`
- `LocatorInterface::getService`
- `LocatorInterface::resolveService`

#### Signature

- It is a **public** method.
- It accepts the following parameter(s):
    - `$id` (`string`) &mdash; The unique identifier.
- _Returns:_ The service or resolved value.
    - `Phine\Locator\ServiceInterface`
    - `mixed`

### `offsetSet()` <a name="offsetSet"></a>

Registers or replaces a service with the unique identifier.

#### Description

The service will be registered with the given unique identifier. If
a service is already registered with the unique identifier, it will
be replaced. No exception will be thrown for using a unique identifier
that is already registered with the service locator.

#### See Also

- `LocatorInterface::isServiceRegistered`
- `LocatorInterface::registerService`
- `LocatorInterface::replaceService`

#### Signature

- It is a **public** method.
- It accepts the following parameter(s):
    - `$id` (`string`) &mdash; The unique identifier.
    - `$service` (`Phine\Locator\ServiceInterface`) &mdash; The service.
- It does not return anything.

### `offsetUnset()` <a name="offsetUnset"></a>

Unregisters the service with the unique identifier, if registered.

#### Description

If a service is registered with the unique identifier, it will be
unregistered from the service locator. If a service is not registered,
an exception will not be thrown as if directly calling the
{@link LocatorInterface::unregisterService} method.

#### See Also

- `LocatorInterface::isServiceRegistered`
- `LocatorInterface::unregisterService`

#### Signature

- It is a **public** method.
- It accepts the following parameter(s):
    - `$id` (`string`) &mdash; The unique identifier.
- It does not return anything.

