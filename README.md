# Islamic Network MicroSevice Helpers
[![CircleCI](https://circleci.com/gh/islamic-network/microservice-helpers.svg?style=shield)](https://circleci.com/gh/islamic-network/microservice-helpers)
[![Latest Stable Version](https://poser.pugx.org/islamic-network/microservice-helpers/v/stable)](https://packagist.org/packages/islamic-network/microservice-helpers)
[![Total Downloads](https://poser.pugx.org/islamic-network/microservice-helpers/downloads)](https://packagist.org/packages/islamic-network/microservice-helpers)
[![License](https://poser.pugx.org/islamic-network/microservice-helpers/license)](https://packagist.org/packages/islamic-network/microservice-helpers)
[![Monthly Downloads](https://poser.pugx.org/islamic-network/microservice-helpers/d/monthly)](https://packagist.org/packages/islamic-network/microservice-helpers)
[![Daily Downloads](https://poser.pugx.org/islamic-network/microservice-helpers/d/daily)](https://packagist.org/packages/islamic-network/microservice-helpers)
[![composer.lock](https://poser.pugx.org/islamic-network/microservice-helpers/composerlock)](https://packagist.org/packages/islamic-network/microservice-helpers)

This is a group of various PHP helpers that have been extrapolated from the AlAdhan and AlQuran APIs.

They can be used on any projects that use PHP 7.1+.

## Current Packages
1. A Response helper, which standardizes JSON responses for APIs by including the HTTP code and status in the response itself. See https://api.aladhan.com/v1/gToH, for example.
2. Health check monitors for:
  * Memcached
  * Redis
  * MySQL

## Installation
```
composer require islamic-network/microservice-helpers
```

## How to Use to Build a Healthcheck page, for instance

```php
use IslamicNetwork\MicroServiceHelpers\Monitors\Memcached;
use IslamicNetwork\MicroServiceHelpers\Monitors\Redis;
use use IslamicNetwork\MicroServiceHelpers\Monitors\MySql;
use IslamicNetwork\MicroServiceHelpers\Formatters\Response;

// Create monitors
$memcachedMonitor = new Memcached($host, $port);
$redisMonitor = new Redis($host, $port);
$mysqlMonitor = new MySql($host, $port);

if (!$memcachedMonitor || !$redisMonitor || !$mysqlMonitor) {
    $httpCode = 500;
} else {
    $httpCode = 200;
}

Response::build(
    [ 
        'memcached' => $memcachedMonitor->status(),
        'redis' => $redisMonitor->status(),
        'mysql' => $mysqlMonitor->status(),
    ],
    $httpCode
);
```

 





