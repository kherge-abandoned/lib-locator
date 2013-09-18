<small>Phine\Locator\Service</small>

ProtectedResolvableService
==========================

Protects the value of a resolvable service.

Signature
---------

- It is a(n) **class**.
- It implements the [`ResolvableInterface`](../../../Phine/Locator/Service/ResolvableInterface.md) interface.
- It is a subclass of [`AbstractService`](../../../Phine/Locator/Service/AbstractService.md).

Methods
-------

The class defines the following methods:

- [`__construct()`](#__construct) &mdash; Sets the resolvable service.
- [`getResolvedValue()`](#getResolvedValue) &mdash; Returns the value resolved by the service.

### `__construct()` <a name="__construct"></a>

Sets the resolvable service.

#### Signature

- It is a **public** method.
- It accepts the following parameter(s):
    - `$service` ([`ServiceInterface`](../../../Phine/Locator/Service/ServiceInterface.md)) &mdash; The resolvable service.
- It does not return anything.
- It throws one of the following exceptions:
    - [`ServiceException`](http://php.net/class.ServiceException) &mdash; If the service is not resolvable.

### `getResolvedValue()` <a name="getResolvedValue"></a>

Returns the value resolved by the service.

#### Description

The value returned by the protected service will be cached for the
life of the instance. All subsequent calls made to this method will
return the cached resolved value.

#### Signature

- It is a **public** method.
- It returns a(n) `mixed` value.

