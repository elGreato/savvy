<?php
/**
 * Created by PhpStorm.
 * User: Ali Habbabeh
 * Date: 10/30/2017
 * Time: 9:15 PM
 */
namespace config;
class Config
{
    protected static $iniFile = "config/config.env";
    protected static $config = [];
    public static function init()
    {
        if (file_exists(self::$iniFile)) {
            $databaseConfig = parse_ini_file(self::$iniFile, true)["database"];
            self::$config["pdo"]["dsn"] = $databaseConfig ["driver"] . ":host=" . $databaseConfig ["host"] . ";port=" . $databaseConfig["port"] . "; dbname=" . $databaseConfig ["database"] . "; sslmode=require";
            self::$config["pdo"]["user"] = $databaseConfig["user"];
            self::$config["pdo"]["password"] = $databaseConfig["password"];
            $emailconfig = parse_ini_file(self::$iniFile, true)["email"];
            self::$config["email"]["apikey"] = $emailconfig["apikey"];
        } else {

            if (isset($_ENV["DATABASE_URL"])) {
                $dbopts = parse_url(getenv('DATABASE_URL'));
                self::$config["pdo"]["dsn"] = "pgsql" . ":host=" . $dbopts["host"] . ";port=" . $dbopts["port"] . "; dbname=" . ltrim($dbopts["path"], '/') . "; sslmode=require";
                self::$config["pdo"]["user"] = $dbopts["user"];
                self::$config["pdo"]["password"] = $dbopts["pass"];
            }
            if (isset($_ENV["EMAIL"])) {
                echo self::$config["email"]["apikey"] = getenv('EMAIL');

            }
        }

    }
    public static function pdoConfig($key){
        if(empty(self::$config))
            self::init();
        return self::$config["pdo"][$key];
    }
    public static function emailConfig(){
        self::init();
        echo "email: ". self::$config["email"]["apikey"]." end";
        return self::$config["email"]["apikey"];
    }
}
