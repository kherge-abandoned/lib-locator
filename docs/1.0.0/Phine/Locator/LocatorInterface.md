<small>Phine\Locator</small>

LocatorInterface
================

Defines how a service locator class must be implemented.

Signature
---------

- It is a(n) **interface**.

Methods
-------

The interface defines the following methods:

- [`getService()`](#getService) &mdash; Returns the service registered with the unique identifier.
- [`getServiceId()`](#getServiceId) &mdash; Returns the unique identifier for the registered service.
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
- _Returns:_ The registered service.
    - [`ServiceInterface`](../../Phine/Locator/Service/ServiceInterface.md)

### `getServiceId()` <a name="getServiceId"></a>

Returns the unique identifier for the registered service.

#### Description

If the service is registered multiple times under different keys, only
the first key found will be returned. If `$first` is set to false, all
found keys will be returned instead.

#### Signature

- It is a **public** method.
- It accepts the following parameter(s):
    - `$service` ([`ServiceInterface`](../../Phine/Locator/Service/ServiceInterface.md)) &mdash; The registered service.
    - `$first` (`boolean`) &mdash; Only return first identifier?
- _Returns:_ The unique identifier(s).
    - `array`
    - `string`
- It throws one of the following exceptions:
    - `LocatorException` &mdash; If the service is not registered.

### `isServiceRegistered()` <a name="isServiceRegistered"></a>

Checks if a service is registered with the unique identifier.

#### Signature

- It is a **public** method.
- It accepts the following parameter(s):
    - `$id` (`string`) &mdash; The unique identifier.
- _Returns:_ Returns `true` if it is registered, `false` if not.
    - `boolean`

### `isServiceResolvable()` <a name="isServiceResolvable"></a>

Checks if a service is resolvable.

#### Signature

- It is a **public** method.
- It accepts the following parameter(s):
    - `$id` (`string`) &mdash; The unique identifier.
- _Returns:_ Returns `true` if it is resolvable, `false` if not.
    - `boolean`
- It throws one of the following exceptions:
    - `LocatorException` &mdash; If the unique identifier is not in use.

### `unregisterService()` <a name="unregisterService"></a>

Unregisters a service with the unique identifier.

#### Signature

- It is a **public** method.
- It accepts the following parameter(s):
    - `$id` (`string`) &mdash; The unique identifier.
- It does not return anything.
- It throws one of the following exceptions:
    - `LocatorException` &mdash; If the unique identifier is not in use.

### `registerService()` <a name="registerService"></a>

Registers a service with the unique identifier.

#### Signature

- It is a **public** method.
- It accepts the following parameter(s):
    - `$id` (`string`) &mdash; The unique identifier.
    - `$service` ([`ServiceInterface`](../../Phine/Locator/Service/ServiceInterface.md)) &mdash; The service.
- It does not return anything.
- It throws one of the following exceptions:
    - `LocatorException` &mdash; If the unique identifier is already in use.

### `replaceService()` <a name="replaceService"></a>

Replaces the service registered with the unique identifier.

#### Signature

- It is a **public** method.
- It accepts the following parameter(s):
    - `$id` (`string`) &mdash; The unique identifier.
    - `$service` ([`ServiceInterface`](../../Phine/Locator/Service/ServiceInterface.md)) &mdash; The service.
- It does not return anything.
- It throws one of the following exceptions:
    - `LocatorException` &mdash; If the unique identifier is not in use.

### `resolveService()` <a name="resolveService"></a>

Resolves a {@link ResolvableInterface} service and returns the value.

#### Signature

- It is a **public** method.
- It accepts the following parameter(s):
    - `$id` (`string`) &mdash; The unique identifier.
- _Returns:_ The service resolved value.
    - `mixed`
- It throws one of the following exceptions:
    - `LocatorException` &mdash; If the service is not resolvable.

