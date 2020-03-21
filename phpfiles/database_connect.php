<?php

$SERVER_NAME="localhost:3306";
$DB_USERNAME="root";
$DB_PASSWORD="namra370h55v";
$conn;


function connect(){
    global $SERVER_NAME, $USERNAME,$PASSWORD;
    try {
        $conn = new PDO("mysql:host=$SERVER_NAME;dbname=savinggoal", $DB_USERNAME, $DB_PASSWORD);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return true;
    }
    catch(PDOException $e){
       return false;
    }
    
}

?>