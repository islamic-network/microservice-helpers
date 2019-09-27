<?php


namespace IslamicNetwork\MicroServiceHelpers\Monitors;
use Vesica\Cacher\Redis as Cache;


class Redis
{
    private $cache;
    public $status;

    public function __construct(string $host, int $port)
    {
        $this->cache = new Cache($host, $port, 'IslamicNetworkMonitor');
        $this->status = $this->cache->set('status', 'redis');
    }

}