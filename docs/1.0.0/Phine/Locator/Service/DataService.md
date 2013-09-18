<small>Phine\Locator\Service</small>

DataService
===========

Allows data to be shared among services.

Signature
---------

- It is a(n) **class**.
- It implements the [`ServiceInterface`](../../../Phine/Locator/Service/ServiceInterface.md) interface.
- It is a subclass of [`ArrayObject`](http://php.net/class.ArrayObject).

Methods
-------

The class defines the following methods:

- [`getLocator()`](#getLocator) &mdash; Returns the service locator.
- [`setLocator()`](#setLocator) &mdash; Sets the service locator.

### `getLocator()` <a name="getLocator"></a>

Returns the service locator.

#### Signature

- It is a **public** method.
- _Returns:_ The service locator.
    - [`LocatorInterface`](../../../Phine/Locator/LocatorInterface.md)

### `setLocator()` <a name="setLocator"></a>

Sets the service locator.

#### Signature

- It is a **public** method.
- It accepts the following parameter(s):
    - `$locator` ([`LocatorInterface`](../../../Phine/Locator/LocatorInterface.md)) &mdash; The service locator.
- It does not return anything.

