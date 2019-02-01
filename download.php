<?php
    session_start();
    if(!isset($_SESSION["user"])){
        header("Location:login.html");
    }
    $user = $_SESSION["user"];
    $file = $_REQUEST["file"];
    $filepath = "/srv/uploads/users/".$user."/".$file;
    readfile($filepath);
    header("Location:files.php");
?>
