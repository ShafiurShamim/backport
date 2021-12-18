<?php

namespace App\Http\Traits\Manage;

use Doctrine\DBAL\DriverManager;

trait DBManager
{
    public function getConnection()
    {
        return DriverManager::getConnection(config('database.connections.pdo_mysql'));
    }

    public function getSchemaManager()
    {
        return $this->getConnection()->getSchemaManager();
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
