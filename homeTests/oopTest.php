<?php
/**
 * Created by PhpStorm.
 * User: Area-51
 * Date: 11/5/2017
 * Time: 10:55 AM
 */
class Customer
{

  public  $a = 5;
    public $b = 10;




    public function add(){
       return $this->a + $this->b;

    }



}
$x = new Customer();
echo $x->add();



?>

