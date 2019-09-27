<?php


namespace IslamicNetwork\MicroServiceHelpers\Monitors;

/**
 * Class Monitor
 * @package IslamicNetwork\MicroServiceHelpers\Monitors
 */
class Monitor
{
    protected $status;

    public function status()
    {
        if ($this->status) {
            return 'OK';
        }

        return 'NOT OK';
    }

}