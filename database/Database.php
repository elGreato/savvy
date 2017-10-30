<?php
/**
 * Created by PhpStorm.
 * User: Area-51
 * Date: 10/30/2017
 * Time: 9:18 PM
 */
namespace database;
use \PDO;
use config\Config;
class Database
{
    private static $pdoInstance = null;
    protected function __construct()
    {
        self::$pdoInstance = new PDO (Config::pdoConfig("dsn"), Config::pdoConfig("user"), Config::pdoConfig("password"));
        self::$pdoInstance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    public static function connect()
    {
        if (self::$pdoInstance) {
            return self::$pdoInstance;
        }
        new self();
        return self::$pdoInstance;
    }
}