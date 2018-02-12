<?php

namespace App\Models;

use PDO;

/**
*Post model
*/
class Post extends \Core\Database
{
    public static function getAll()
    {
        try {
            $db = static::getDB();
            $stmt =$db->query('SELECT id, title, content FROM posts order by created_at');
            $result =$stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
