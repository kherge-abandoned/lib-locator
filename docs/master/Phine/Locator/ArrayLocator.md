<small>Phine\Locator</small>

ArrayLocator
============

An array accessible service locator.

Signature
---------

- It is a(n) **class**.
- It implements the [`ArrayLocatorInterface`](../../Phine/Locator/ArrayLocatorInterface.md) interface.
- It is a subclass of [`Locator`](../../Phine/Locator/Locator.md).

Methods
-------

The class defines the following methods:

- [`offsetExists()`](#offsetExists)
- [`offsetGet()`](#offsetGet) &mdash; Returns the service with the unique identifier, or its resolved value.
- [`offsetSet()`](#offsetSet) &mdash; Registers or replaces a service with the unique identifier.
- [`offsetUnset()`](#offsetUnset) &mdash; Unregisters the service with the unique identifier, if registered.

### `offsetExists()` <a name="offsetExists"></a>

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

#### Signature

- It is a **public** method.
- It accepts the following parameter(s):
    - `$id` (`string`) &mdash; The unique identifier.
- It can return one of the following values:

    - [`ServiceInterface`](http://php.net/class.Phine\Locator\ServiceInterface)
    - `mixed`
### `offsetSet()` <a name="offsetSet"></a>

Registers or replaces a service with the unique identifier.

#### Description

The service will be registered with the given unique identifier. If
a service is already registered with the unique identifier, it will
be replaced. No exception will be thrown for using a unique identifier
that is already registered with the service locator.

#### Signature

- It is a **public** method.
- It accepts the following parameter(s):
    - `$id` (`string`) &mdash; The unique identifier.
    - `$service` ([`ServiceInterface`](http://php.net/class.Phine\Locator\ServiceInterface)) &mdash; The service.
- It does not return anything.

### `offsetUnset()` <a name="offsetUnset"></a>

Unregisters the service with the unique identifier, if registered.

#### Description

If a service is registered with the unique identifier, it will be
unregistered from the service locator. If a service is not registered,
an exception will not be thrown as if directly calling the
{@link LocatorInterface::unregisterService} method.

#### Signature

- It is a **public** method.
- It accepts the following parameter(s):
    - `$id` (`string`) &mdash; The unique identifier.
- It does not return anything.

