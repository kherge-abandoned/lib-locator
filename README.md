Locator
=======

[![Build Status][]](https://travis-ci.org/phine/lib-locator)
[![Coverage Status][]](https://coveralls.io/r/phine/lib-locator)
[![Latest Stable Version][]](https://packagist.org/packages/phine/locator)
[![Total Downloads][]](https://packagist.org/packages/phine/locator)

An implementation of the service locator design pattern.

Usage
-----

```php
use Phine\Locator\Locator;
use Phine\Locator\Service\AbstractService;
use Phine\Locator\Service\ResolvableInterface;

/**
 * A service that simply gets returned.
 */
class SimpleService extends AbstractService
{
}

/**
 * A service that causes the locator to return something else.
 */
class ResolvedService extends AbstractService implements ResolvableInterface
{
    /**
     * {@inheritDoc}
     */
    public function getResolvedValue()
    {
        return 'Something else.';
    }
}

// create my locator
$locator = new Locator();

// register my services
$locator->registerService('simple', new SimpleService());
$locator->registerService('resolved', new ResolvedService());

// access my services
echo get_class($locator->getService('simple')); // "SimpleService"
echo $locator->resolveService('resolved'); // "Something else."
```

Array accessible version of above:

```php
use Phine\Locator\ArrayLocator;

// create my locator
$locator = new ArrayLocator();

// register my services
$locator['simple'] = new SimpleService();
$locator['resolved'] = new ResolvedService();

// access my services
echo get_class($locator['simple']); // "SimpleService"
echo $locator['resolved']; // "Something else."
```

Examples
--------

Please see the [wiki][] for examples.

Requirement
-----------

- PHP >= 5.3.3
- [Phine Exception][] >= 1.0.0

Installation
------------

Via [Composer][]:

    $ composer require "phine/locator=~1.0"

Documentation
-------------

You can find the documentation in the [`docs/`](docs/) directory.

License
-------

This library is available under the [MIT license](LICENSE).

[Build Status]: https://travis-ci.org/phine/lib-locator.png?branch=master
[Coverage Status]: https://coveralls.io/repos/phine/lib-locator/badge.png
[Latest Stable Version]: https://poser.pugx.org/phine/locator/v/stable.png
[Total Downloads]: https://poser.pugx.org/phine/locator/downloads.png
[Pimple]: https://github.com/fabpot/Pimple
[wiki]: https://github.com/phine/lib-locator/wiki
[Phine Exception]: https://github.com/phine/lib-exception
[Composer]: http://getcomposer.org/
