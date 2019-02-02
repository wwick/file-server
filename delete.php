<?php
//ensures that a username is supplied as a session variable
session_start();
if(!isset(_SESSION["user"])){
    header("Location:login.html");
}
$user = $_SESSION["user"];
//gets path to file
$dir = "/srv/uploads/users/".$user;
$fileName = basename($_REQUEST["file"]);
//deletes file
unlink($dir."/".$fileName);
header("Location:files.php");
?>
