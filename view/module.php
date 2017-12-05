<?php
/**
 * Created by PhpStorm.
 * User: Ali-Surface
 * Date: 12/5/2017
 * Time: 10:48 AM
 */

require_once "headerLoggedIn.php";

?>

<title> <?php echo $this->mod->getName();?> </title>
<h1> <?php echo $this->mod->getName();?>    </h1>
<h4> <?php echo $this->mod->getDescription();?></h4>

<?php
foreach ($this->comments as $comment):?>
    <span class="commentBody">
        <style>
             .commentBody {
                 display: inline-table;
                 text-align: center;
                 background-color: rgba(3, 78, 136, 0.7);
                 width: 200px;
                 height: 10px;
                 line-height: 20px;
                 color: white;
                 margin: 10px;
                 position: relative;
                 padding: 10px;
             }
        </style>

        <?php echo $comment->getComment()?>

        <?php echo $comment->getStudentname() ?>


    </span>



<?php  endforeach;?>











<?php require_once "footer.php";?>
