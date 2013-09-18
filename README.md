Exception
=========

[![Build Status][]](https://travis-ci.org/phine/lib-locator)
[![Coverage Status][]](https://coveralls.io/r/phine/lib-locator)
[![Latest Stable Version][]](https://packagist.org/packages/phine/locator)
[![Total Downloads][]](https://packagist.org/packages/phine/locator)

An implementation of the service locator design pattern.

Usage
-----

This example provides a very simple overview of the array accessible
service locator. You may, however, want to have a better understanding
of the `Locator` class first by reading through the API documentation.

```php
use Phine\Locator\ArrayLocator;
use Phine\Locator\Service\AbstractService;
use Phine\Locator\Service\DataService;
use Phine\Locator\Service\ResolvableInterface;

/**
 * Some sort of shared unique identifier for the data.
 *
 * If you build an application on top of this with the intent of supporting
 * third-party services, you will need to determine for yourself what is the
 * best way of sharing a service identifier for the data service. That is, if
 * you opt to use the bundled data service.
 */
define('DATA', 'data');

/**
 * An example service that simple resolves into a string when used.
 */
class MyService extends AbstractService implements ResolvableInterface
{
    public function getResolvedValue()
    {
        $data = $this->locator->getService(DATA);

        return sprintf(
            "Date: %s\nTime: %d\nRandom: %d\n",
            $data['date']->format('r'),
            $data['time'],
            $data['rand']
        );
    }
}


// create an instance of the data service
$data = new DataService();

// add some random data
$data['date'] = new DateTime();
$data['time'] = time();
$data['rand'] = rand();

// create an array service locator
$locator = new ArrayLocator();

// register some services
$locator[DATA] = $data;
$locator['my.service'] = new MyService();

// retrieve the "my.service" service
echo $locator['my.service'];

/*
 * Due to how the array service locator manages the retrieval of registered
 * services, the resolved value of the custom service was returned instead
 * of an instance of the service itself:
 *
 * "Date: Tue, 17 Sep 2013 23:50:55 +0000
 * Time: 1379461855
 * Random: 908627826"
 *
 * If MyService did not implement the ResolvableInterface interface, it would
 * have simply returned the instance that was registered with the service
 * locator, which could be useful in other circumstances.
 */
```

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
[Phine Exception]: https://github.com/phine/lib-exception
[Composer]: http://getcomposer.org/
