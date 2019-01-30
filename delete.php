<?php
    session_start();
    if(!isset(_SESSION["user"]){
        header("Location:http://ec2-52-14-191-6.us-east-2.compute.amazonaws.com/~wwick/git/spring2019-module2-group-455281-467000/login.html");
    }
    $user = $_SESSION["user"];
    $dir = "/srv/uploads/users/".$user;
    $fileName = basename($_SESSION["file"]);
    unlink($dir."/".$fileName);
?>
