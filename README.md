# Laravel Auto Translate

[![Latest Version](https://img.shields.io/github/release/ben182/laravel-auto-translate.svg?style=flat-square)](https://github.com/ben182/laravel-auto-translate/releases)
[![Build Status](https://img.shields.io/travis/ben182/laravel-auto-translate/master.svg?style=flat-square)](https://travis-ci.org/ben182/laravel-auto-translate)
[![Quality Score](https://img.shields.io/scrutinizer/g/ben182/laravel-auto-translate.svg?style=flat-square)](https://scrutinizer-ci.com/g/ben182/laravel-auto-translate)
[![Code Coverage](https://scrutinizer-ci.com/g/ben182/laravel-auto-translate/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/ben182/laravel-auto-translate/?branch=master)

With this package you can translate your language files using a translator service. Currently the package ships only with Google Translate.

Specify a source language and a target language and it will automatically translate your files. This is useful if you want to prototype something quickly or just a first idea of the translation for later editing. The package ships with two artisan commands. One for translating all the missing translations that are set in the source language but not in the target language. The other one for translating all source language files and overwriting everything in the target language.

## Installation

This package can be used in Laravel 5.6 or higher.

You can install the package via composer:

```bash
composer require ben182/laravel-auto-translate
```

## Config

After installation publish the config file:

```bash
php artisan vendor:publish --provider="Ben182\AutoTranslate\AutoTranslateServiceProvider"
```

You can specify your source language, the target language(s), the translator and the path to your language files in there.

## Usage

### Missing translations

Simply call the artisan missing command for translating all the translations that are set in your source language, but not in your target language:

```bash
php artisan autotrans:missing
```

E.g. you have English set as your source language. The source language has translations in auth.php:

```php
<?php

return [
    'failed' => 'These credentials do not match our records.',
    'throttle' => 'Too many login attempts. Please try again in :seconds seconds.',
];
```

Your target language is German. The auth.php file has the following translations:

```php
<?php

return [
    'failed' => 'Diese Kombination aus Zugangsdaten wurde nicht in unserer Datenbank gefunden.',
];
```

The artisan missing command will then translate the missing `auth.throttle` key.

### All translations

To overwrite all your existing target language keys with the translation of the source language simply call:

```bash
php artisan autotrans:all
```

This will overwrite every single key with a translation of the equivalent source language key.

## Extending

You can create your own translator by creating a class that implements `\Ben182\AutoTranslate\Translators\TranslatorInterface`. Simply reference it in your config file.

### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email moin@benjaminbortels.de instead of using the issue tracker.

## Credits

- [Benjamin Bortels](https://github.com/ben182)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Laravel Package Boilerplate

This package was generated using the [Laravel Package Boilerplate](https://laravelpackageboilerplate.com).
