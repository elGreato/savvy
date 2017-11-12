<?php
/**
 * Created by PhpStorm.
 * User: Area-51
 * Date: 11/5/2017
 * Time: 10:24 AM
 */

session_start();
if (! isset ($_SESSION[' viewCount'])) {
    $_SESSION[' viewCount'] = 1;
} else {
    $_SESSION[' viewCount']++;
}
?>
<a href="sessionCountView.php">Show Session Count</a>