<?php

/**
 * @namespace
 */
namespace Core\Database\Drivers;

/**
 * @package
 */
use Core\Contracts\Interfaces\Mysql as MysqlInterface;


/**
 * @desc mysql driver
 * @class
 * @implements {MysqlInterface}
 */
class Mysql implements MysqlInterface {
    private static $instance;
    private $connection;


    private function __construct() {
        try {
            $this->connection = new \PDO("mysql:host=localhost;dbname=sample;charset=utf8", "root", "", [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION, \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ]);
        } catch (\PDOException $error) {
            die("Database connection was failed: " . $error->getMessage());
        }
    }

    public static function getInstance(): self {
        if(!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function getConnection(): object {
        return $this->connection;
    }
}