<?php
/**
 * Created by PhpStorm.
 * User: $Ali_Habbabeh
 * Date: 11/26/2017
 * Time: 4:41 PM
 */

require_once 'util/initialize.php';

require_once "header.php";

?>
    <!DOCTYPE html>
    <html>

        <head>
                <meta charset="utf-8">
                <title>Contact Us</title>
        </head>
        <body>
             <div class="contactUs_page" align="center">
                 <form id="contact_form" action="<?php echo $GLOBALS["ROOT_URL"]; ?>/contactus" method="POST" name="contactForm" >
                     <div class="row">
                         <label for="name">Your name:</label><br />
                         <input id="name" class="input" name="name" type="text" value="" size="30" /><br />
                     </div>
                     <div class="row">
                         <label for="email">Your email:</label><br />
                         <input id="email" class="input" name="email" type="text" value="" size="30" /><br />
                     </div>
                     <div class="row">
                         <label for="message">Your message:</label><br />
                         <textarea id="message" class="input" name="message" rows="7" cols="30"></textarea><br />
                     </div>
                     <input id="submit_button" type="submit" value="Send email" />
                 </form>
             </div>
        </body>
    </html>


<?php require_once "footer.php"; ?>
