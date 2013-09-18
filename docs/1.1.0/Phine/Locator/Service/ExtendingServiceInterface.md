<small>Phine\Locator\Service</small>

ExtendingServiceInterface
=========================

Defines how a service class extending another must be implemented.

Description
-----------

If a service class exists to extend another, it is strongly encouraged that
this interface be implemented. It will allow other services to identify an
extended service, as well as make it possible to retrieve the service that
is being extended.

Signature
---------

- It is a(n) **interface**.
- It implements the [`ServiceInterface`](../../../Phine/Locator/Service/ServiceInterface.md) interface.

Methods
-------

The interface defines the following methods:

- [`getExtendedService()`](#getExtendedService) &mdash; Returns the service that is being extended.

### `getExtendedService()` <a name="getExtendedService"></a>

Returns the service that is being extended.

#### Signature

- It is a **public** method.
- _Returns:_ The extended service.
    - [`ServiceInterface`](../../../Phine/Locator/Service/ServiceInterface.md)

