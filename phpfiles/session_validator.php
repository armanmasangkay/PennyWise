<?php
session_start();
//checks if the user is logged in or not
if (!(isset($_SESSION['login']) && $_SESSION['login'] != '')) {
    //pushes the user to the logged in page and flagging it as "Not_logged" for the appropriate alert to show up
    $_SESSION['not_logged']="1";
    header ("Location: login.php");
}
?>