<small>Phine\Locator\Exception</small>

LocatorException
================

Exception thrown for problems with a locator.

Signature
---------

- It is a(n) **class**.
- It is a subclass of [`Exception`](http://php.net/class.Phine\Exception\Exception).

Methods
-------

The class defines the following methods:

- [`idNotResolvable()`](#idNotResolvable) &mdash; Creates an exception for an unresolvable service unique identifier.
- [`idNotUsed()`](#idNotUsed) &mdash; Creates an exception for an unused service unique identifier.
- [`idUsed()`](#idUsed) &mdash; Creates an exception for a service unique identifier already in use.

### `idNotResolvable()` <a name="idNotResolvable"></a>

Creates an exception for an unresolvable service unique identifier.

#### Signature

- It is a **public static** method.
- It accepts the following parameter(s):
    - `$id` (`string`) &mdash; The unique identifier.
- It returns a(n) [`LocatorException`](../../../Phine/Locator/Exception/LocatorException.md) value.

### `idNotUsed()` <a name="idNotUsed"></a>

Creates an exception for an unused service unique identifier.

#### Signature

- It is a **public static** method.
- It accepts the following parameter(s):
    - `$id` (`string`) &mdash; The unique identifier.
- It returns a(n) [`LocatorException`](../../../Phine/Locator/Exception/LocatorException.md) value.

### `idUsed()` <a name="idUsed"></a>

Creates an exception for a service unique identifier already in use.

#### Signature

- It is a **public static** method.
- It accepts the following parameter(s):
    - `$id` (`string`) &mdash; The unique identifier.
- It returns a(n) [`LocatorException`](../../../Phine/Locator/Exception/LocatorException.md) value.

