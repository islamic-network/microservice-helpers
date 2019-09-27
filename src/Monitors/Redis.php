<?php


namespace IslamicNetwork\MicroServiceHelpers\Monitors;
use Vesica\Cacher\Redis as Cache;
use Exception;

class Redis extends Monitor
{
    private $cache;

    public function __construct(string $host, int $port)
    {
        try {
            $this->cache = new Cache($host, $port, 'IslamicNetworkMonitor');
            $this->status = $this->cache->set('status', 'redis');
        } catch (Exception $e) {
            $this->status = false;
        }
    }

}