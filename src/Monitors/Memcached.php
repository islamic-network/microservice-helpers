<?php


namespace IslamicNetwork\MicroServiceHelpers\Monitors;
use Vesica\Cacher\Memcached as Cache;
use Exception;

class Memcached
{
    private $cache;
    public $status;

    public function __construct(string $host, int $port)
    {
        try {
            $this->cache = new Cache($host, $port, 'IslamicNetworkMonitor');
            $this->status = $this->cache->set('status', 'memcached');
        } catch (Exception $e) {
            $this->status = false;
        }
    }

}