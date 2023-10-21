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
    /**
     * @desc the Mysql instance
     * @prop
     * @private
     * @static
     * @type {object}
     * @return {object} 
     */
    private static $instance;

    /**
     * @desc database connection
     * @prop
     * @private
     * @static
     * @type {object}
     * @return {object} 
     */
    private object $connection;


    /**
     * @constructor
     * @private
     */
    private function __construct() {
        try {
            $this->connection = new \PDO("mysql:host=localhost;dbname=sample;charset=utf8", "root", "", [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION, \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ]);
        } catch (\PDOException $error) {
            die("Database connection was failed: " . $error->getMessage());
        }
    }

    /**
     * @desc get instance of the Mysql object
     * @method
     * @public
     * @static
     * @name getInstance
     * @return {object}
     */
    public static function getInstance(): self {
        if(!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * @desc get database connection object
     * @method
     * @public
     * @name getConnection
     * @return {object}
     */
    public function getConnection(): object {
        return $this->connection;
    }
}