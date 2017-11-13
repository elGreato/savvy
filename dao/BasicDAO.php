<?php

/**
 * Created by PhpStorm.
 * User: Area-51
 * Date: 11/12/2017
 * Time: 3:47 PM
 */

use database\Database;
//use \PDO;

abstract class BasicDAO {

    protected $pdoInstance;

    public function __construct(PDO $pdoInstance = null) {
        if(is_null($pdoInstance)){
            $this->pdoInstance = Database::connect();
        } else {
            $this->pdoInstance = $pdoInstance;
        }
    }
}
?>
