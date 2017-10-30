<?php
/**
 * Created by PhpStorm.
 * User: Area-51
 * Date: 10/30/2017
 * Time: 9:16 PM
 */

namespace config;
class Autoloader
{
    public static function autoload($className) {
        //replace namespace backslash to directory separator of the current operating system
        $className = str_replace('\\', DIRECTORY_SEPARATOR, $className);
        $fileName = $className . '.php';
        if (file_exists($fileName)) {
            include_once($fileName);
        } else {
            return false;
        }
    }
}
spl_autoload_register(array('config\Autoloader', 'autoload'));