<?php
namespace IslamicNetwork\MicroServiceHelpers\Monitors;

use Doctrine\DBAL\Configuration;
use Doctrine\DBAL\DriverManager;
use Exception;

class MySql extends Monitor
{
    private $db;

    public function __construct(string $host, int $port, string $username, string $password, string $database, string $sql, string $charset = 'utf8mb4')
    {
        $connectionParams = [
            'dbname' => $database,
            'user' => $username,
            'password' => $password,
            'host' => $host,
            'charset' => $charset,
            'driver' => 'pdo_mysql',
        ];

        try {
            $this->db = DriverManager::getConnection($connectionParams, new Configuration());

            $this->status = is_array($this->db->fetchAssoc($sql));
        } catch (Exception $e) {
            $this->status = false;
        }





    }

}