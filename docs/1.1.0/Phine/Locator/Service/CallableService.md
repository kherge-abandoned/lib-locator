<small>Phine\Locator\Service</small>

CallableService
===============

Makes a callable a resolvable service.

Signature
---------

- It is a(n) **class**.
- It implements the [`ResolvableInterface`](../../../Phine/Locator/Service/ResolvableInterface.md) interface.
- It is a subclass of [`AbstractService`](../../../Phine/Locator/Service/AbstractService.md).

Methods
-------

The class defines the following methods:

- [`__construct()`](#__construct) &mdash; Sets the callable.
- [`getResolvedValue()`](#getResolvedValue) &mdash; Returns the value resolved by the service.

### `__construct()` <a name="__construct"></a>

Sets the callable.

#### Description

The `$invoke` flag is used to determine if the given callable should
be called every time the `getResolvedValue()` method is called, or if
it should be returned instead. By setting it to `true` (the default),
the callable will be invoked.

#### Signature

- It is a **public** method.
- It accepts the following parameter(s):
    - `$callable` (`Phine\Locator\Service\callable`) &mdash; The callable.
    - `$invoke` (`boolean`) &mdash; Invoke the callable?
- It does not return anything.
- It throws one of the following exceptions:
    - `ServiceException` &mdash; If `$callable` is not a callable.

### `getResolvedValue()` <a name="getResolvedValue"></a>

Returns the value resolved by the service.

#### Signature

- It is a **public** method.
- _Returns:_ The resolved value.
    - `mixed`

