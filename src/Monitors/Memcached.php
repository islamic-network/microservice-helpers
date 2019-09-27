<?php


namespace IslamicNetwork\MicroServiceHelpers\Monitors;
use Vesica\Cacher\Memcached as Cache;


class Memcached
{
    private $cache;
    public $status;

    public function __construct(string $host, int $port)
    {
        $this->cache = new Cache($host, $port, 'IslamicNetworkMonitor');
        $this->status = $this->cache->set('status', 'memcached');
    }

}