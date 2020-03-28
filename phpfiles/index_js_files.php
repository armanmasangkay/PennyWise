<?php
$HELPER_DIR="../src/js/helpers/";


function addScript($directory){
    return "<script src='$directory' type='text/javascript'></script>";
}


echo addScript( $HELPER_DIR . "save_goal.js");

?>