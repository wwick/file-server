<?php
//ensures that a username is supplied as a session variable
session_start();
if(!isset($_SESSION["user"])){
    header("Location:login.html");
}
$user = $_SESSION["user"];
//gets path to file
$dir = "/srv/uploads/users/".$user;
$file_name = basename($_REQUEST["file"]);
$file = $dir."/".$file_name;
//deletes file
if (file_exists($file)) {
    unlink($file);
}
header("Location:files.php");
?>
