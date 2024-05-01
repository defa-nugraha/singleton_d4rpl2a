<?php

class DatabaseConnection
{
    protected static ?PDO $connection = null;

    private function __construct()
    {
        echo "<br>New Database Instance is Created!<br>";
    }

    public static function getInstance(): PDO
    {
        if (!self::$connection) {
            self::$connection = new PDO('mysql:host=localhost;dbname=kampus_student;port=3306', 'root', 'test');
        }
        return self::$connection;
    }
}
