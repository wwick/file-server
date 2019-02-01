<?php
session_start();
$user = $_SESSION["user"];

$dir = sprintf("/srv/uploads/users/%s", $user);
$filename = basename($_FILES['fileToUpload']['name']);
if(!preg_match('/^[\w_\.\-]+$/', $filename)){
  die("invalid filename");
}
$full_path = sprintf("/srv/uploads/users/%s/%s", $user, $filename);
if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $full_path)){
	header("Location:files.php");
} else {
	echo "failed";
}

?>
