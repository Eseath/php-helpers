# Helpers.php

[![Minimum PHP Version](https://img.shields.io/badge/php-%3E%3D%208.0-8892BF.svg?style=flat)](https://php.net/)
[![Build Status](https://www.travis-ci.com/eseath/php-helpers.svg?branch=master)](https://www.travis-ci.com/eseath/php-helpers)
[![Latest Stable Version](https://img.shields.io/packagist/v/eseath/helpers.svg?style=flat)](https://packagist.org/packages/eseath/helpers)

Collection of helper functions written in PHP.

## Development

```shell
docker build -t php-helpers .
docker run --rm -v "$PWD":/var/package php-helpers composer install
```

## Testing

```shell
docker run --rm -v "$PWD":/var/package php-helpers vendor/bin/phpunit
```
