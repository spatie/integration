# Integration

[![Latest Version on Packagist](https://img.shields.io/github/release/spatie-custom/integration.svg?style=flat-square)](https://packagist.org/packages/spatie-custom/integration)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![SensioLabsInsight](https://img.shields.io/sensiolabs/i/5948fb26-9520-4423-bf3b-4e1b0e5790b0.svg?style=flat-square)](https://insight.sensiolabs.com/projects/5948fb26-9520-4423-bf3b-4e1b0e5790b0)
[![Quality Score](https://img.shields.io/scrutinizer/g/spatie-custom/integration.svg?style=flat-square)](https://scrutinizer-ci.com/g/spatie-custom/integration)

Base integration tests for our laravel applications.

## Install

This package is custom built for [Spatie](https://spatie.be) projects and is therefore not registered on packagist. 
In order to install it via composer you must specify this extra repository in `composer.json`:

```json
"repositories": [ { "type": "composer", "url": "https://satis.spatie.be/" } ]
```

You can install the package via composer:
``` bash
$ composer require spatie/integration
```

## Overview

This package provides the base classes for our integration tests. They are extensions of laravel's testing facilities which were introduced in 5.1.

The base test case for all integration tests is `Spatie\Integration\TestCase`. We're not using laravel's `DatabaseTransations` trait since it only starts the transactions after `setUp()`, which we use to seed our data.

Other cases are for recurring, specific parts of our application, e.g. modules in our custom CMS.

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Security

If you discover any security related issues, please email freek@spatie.be instead of using the issue tracker.

## Credits

- [Spatie](https://github.com/spatie)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
