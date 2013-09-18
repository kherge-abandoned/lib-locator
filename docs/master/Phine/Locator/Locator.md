<small>Phine\Locator</small>

Locator
=======

A service locator.

Signature
---------

- It is a(n) **class**.
- It implements the [`LocatorInterface`](../../Phine/Locator/LocatorInterface.md) interface.

Methods
-------

The class defines the following methods:

- [`getService()`](#getService) &mdash; Returns the service registered with the unique identifier.
- [`isServiceRegistered()`](#isServiceRegistered) &mdash; Checks if a service is registered with the unique identifier.
- [`isServiceResolvable()`](#isServiceResolvable) &mdash; Checks if a service is resolvable.
- [`unregisterService()`](#unregisterService) &mdash; Unregisters a service with the unique identifier.
- [`registerService()`](#registerService) &mdash; Registers a service with the unique identifier.
- [`replaceService()`](#replaceService) &mdash; Replaces the service registered with the unique identifier.
- [`resolveService()`](#resolveService) &mdash; Resolves a {@link ResolvableInterface} service and returns the value.

### `getService()` <a name="getService"></a>

Returns the service registered with the unique identifier.

#### Signature

- It is a **public** method.
- It accepts the following parameter(s):
    - `$id` (`string`) &mdash; The unique identifier.
- It returns a(n) [`ServiceInterface`](../../Phine/Locator/Service/ServiceInterface.md) value.

### `isServiceRegistered()` <a name="isServiceRegistered"></a>

Checks if a service is registered with the unique identifier.

#### Signature

- It is a **public** method.
- It accepts the following parameter(s):
    - `$id` (`string`) &mdash; The unique identifier.
- It returns a(n) `boolean` value.

### `isServiceResolvable()` <a name="isServiceResolvable"></a>

Checks if a service is resolvable.

#### Signature

- It is a **public** method.
- It accepts the following parameter(s):
    - `$id` (`string`) &mdash; The unique identifier.
- It returns a(n) `boolean` value.
- It throws one of the following exceptions:
    - [`LocatorException`](http://php.net/class.LocatorException) &mdash; If the unique identifier is not in use.

### `unregisterService()` <a name="unregisterService"></a>

Unregisters a service with the unique identifier.

#### Signature

- It is a **public** method.
- It accepts the following parameter(s):
    - `$id` (`string`) &mdash; The unique identifier.
- It does not return anything.
- It throws one of the following exceptions:
    - [`LocatorException`](http://php.net/class.LocatorException) &mdash; If the unique identifier is not in use.

### `registerService()` <a name="registerService"></a>

Registers a service with the unique identifier.

#### Signature

- It is a **public** method.
- It accepts the following parameter(s):
    - `$id` (`string`) &mdash; The unique identifier.
    - `$service` ([`ServiceInterface`](../../Phine/Locator/Service/ServiceInterface.md)) &mdash; The service.
- It does not return anything.
- It throws one of the following exceptions:
    - [`LocatorException`](http://php.net/class.LocatorException) &mdash; If the unique identifier is already in use.

### `replaceService()` <a name="replaceService"></a>

Replaces the service registered with the unique identifier.

#### Signature

- It is a **public** method.
- It accepts the following parameter(s):
    - `$id` (`string`) &mdash; The unique identifier.
    - `$service` ([`ServiceInterface`](../../Phine/Locator/Service/ServiceInterface.md)) &mdash; The service.
- It does not return anything.
- It throws one of the following exceptions:
    - [`LocatorException`](http://php.net/class.LocatorException) &mdash; If the unique identifier is not in use.

### `resolveService()` <a name="resolveService"></a>

Resolves a {@link ResolvableInterface} service and returns the value.

#### Signature

- It is a **public** method.
- It accepts the following parameter(s):
    - `$id` (`string`) &mdash; The unique identifier.
- It returns a(n) `mixed` value.
- It throws one of the following exceptions:
    - [`LocatorException`](http://php.net/class.LocatorException) &mdash; If the service is not resolvable.

