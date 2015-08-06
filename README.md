## Macaroons
[![Build Status](https://travis-ci.org/immense/php-macaroons.svg?branch=master)](https://travis-ci.org/immense/php-macaroons)
[![Latest Stable Version](https://poser.pugx.org/immense/macaroons/v/stable)](https://packagist.org/packages/immense/macaroons)
[![License](https://poser.pugx.org/immense/macaroons/license.svg)](https://packagist.org/packages/immense/macaroons)
[![Coverage Status](https://coveralls.io/repos/immense/php-macaroons/badge.svg?branch=master)](https://coveralls.io/r/immense/php-macaroons?branch=master)

This is a PHP implementation of Macaroons. It is still under active development.

## Requirements

* [PHP >= 5.3.6](http://php.net)
* [libsodium](https://github.com/jedisct1/libsodium)
* [libsodium-php](https://github.com/jedisct1/libsodium-php)

## Installing `libsodium-php`

* OS X using [homebrew](https://github.com/Homebrew/homebrew)
  ```bash
  brew tap homebrew/php
  brew install php55-libsodium
  ```

* Using `pecl`
  ```bash
  pecl install libsodium
  ```

## Installation via [composer](https://getcomposer.org)

In your project directory:

* Create a `composer.json` in your project if necessary
  ```bash
  composer init
  ```

* Install the latest version as a project dependency
  ```bash
  composer require immense/macaroons
  ```

## Tests

Files must end with `Test` e.g. `ClassTest.php`

* From the `php-macaroons` root directory:

  ```bash
  phpunit
  ```

* Run tests on file change (optional)
  ```bash
  gem install watchr
  watchr ./autotest-watchr.rb
  ```

## HHVM

Currently [HHVM](http://hhvm.com) is not supported because the PHP libsodium
bindings do not support HHVM.

## License

[php-macaroons](https://github.com/immense/php-macaroons) is licensed under the MIT license. Please see the [license](LICENSE) for more information.
