<?php

/**
 * @namespace
 */
namespace Core\Contracts\Interfaces;


/**
 * @desc declare contracts for Mysql driver
 * @interface
 * @name Mysql
 */
interface Mysql {
    /**
     * @desc declare the "getInstance" method for database object as PDO
     * @method
     * @public
     * @static
     * @name getInstance
     * @return {object}
     */
    public static function getInstance(): self;
    
    /**
     * @desc declare the "getConnection" method for getting connection object
     * @method
     * @public
     * @name getConnection
     * @return {object}
     */
    public function getConnection(): object;
}