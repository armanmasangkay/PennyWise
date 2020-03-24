<?php

require 'database_connect.php';


$conn=connect();
$username=$_POST['username'];
$password=$_POST['password'];


//checks login information
function checkLoginInfo($username,$password){
    global $conn;
    $stmt = $conn->prepare("SELECT username,password FROM User");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

    foreach($stmt->fetchAll() as $k=>$v) {
        if ($v['username']==$username && $v['password']==$password){
            session_start();
            $_SESSION['login']="1";
            return true;
        }else{
            return false;
        }
        
    }
}



if (checkLoginInfo($username,$password)==true){
    echo json_encode(array('success'=>1));
}else{
    echo json_encode(array('success'=>0));
}






?>  