<?php
//ensures that a username is supplied as a session variable
session_start();
if(!isset($_SESSION["user"])){
    header("Location:login.html");
}
$user = $_SESSION["user"];
//specifies path to file within server
$dir = sprintf("/srv/uploads/users/%s", $user);
$filename = basename($_FILES['fileToUpload']['name']);
if(preg_match('/^[\w_\.\-]+$/', $filename)) {
    $full_path = $dir."/".$filename;
    //uploads file
    move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $full_path);
}
header("Location:files.php");

?>

