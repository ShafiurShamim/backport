<?php

namespace App\Http\Traits\Manage;

use Doctrine\DBAL\DriverManager;

trait DBManager
{
    public function getConnection()
    {
        $conn = DriverManager::getConnection(config('database.connections.pdo_mysql'));
        $conn->getDatabasePlatform()->registerDoctrineTypeMapping('enum', 'string');
        return $conn;
    }

    public function getSchemaManager()
    {
        return $this->getConnection()->createSchemaManager();
    }

    public function listTables()
    {
        return $this->getSchemaManager()->listTables();
    }
    
    public function listTableNames()
    {
        return $this->getSchemaManager()->listTableNames();
    }
}
