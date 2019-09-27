<?php


namespace IslamicNetwork\MicroServiceHelpers\Monitors;

use Doctrine\DBAL\Configuration;
use Doctrine\DBAL\DriverManager;

class MySql
{
    private $db;
    private $status;

    public function __construct(string $host, int $port, string $username, string $password, string $database, string $sql = null, string $charset = 'utf8mb4')
    {
        $connectionParams = [
            'dbname' => $database,
            'user' => $username,
            'password' => $password,
            'host' => $host,
            'charset' => $charset,
            'driver' => 'pdo_mysql',
        ];

        $this->db = DriverManager::getConnection($connectionParams, new Configuration());

        $this->status = $this->db->exec($sql);





    }

}