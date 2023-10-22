<?php

/**
 * @package
 */
use Core\Utils\Env;

/**
 * @desc database configs
 * @type {array}
 * return {array}
 */
return [
    "mysql" => [
        "host" => Env::get("MYSQL_HOST"),
        "db" => Env::get("MYSQL_DB"),
        "username" => Env::get("MYSQL_USERNAME"),
        "password" => Env::get("MYSQL_PASSWORD")
    ]
];