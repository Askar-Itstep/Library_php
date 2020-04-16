<?php


namespace App\Models;


class Db
{
    public static $instanceof = null;

    private function __construct()
    {
        /**
         * Don't create object
        */
    }

    public static function get()
    {
        if (is_null(self::$instanceof)) {
            $host = '127.0.0.1';
            $db = 'lesson_composer';
            $user = 'root';
            $pwd = '';
            $charset = 'utf8';

            $dns = "mysql:host=$host;dbname=$db;charset=$charset";
            $options = [
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
            ];

            self::$instanceof = new \PDO($dns, $user, $pwd, $options);
        }
        return self::$instanceof;
    }
}