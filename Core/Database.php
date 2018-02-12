<?php

namespace Core;

use App\Config;

use PDO;

abstract class Database
{
    protected static function getDB()
    {
        static $db = null;
        if ($db == null) {
            $dms = 'mysql:host='.Config::DB_HOST.';dbname='.Config::DB_NAME.';charset=utf8';
            $db = new PDO($dms, Config::DB_USER, Config::DB_PASS);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $db;
        }
    }
}
