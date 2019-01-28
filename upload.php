<?php
session_start();
$user = $_SESSION["user"];
$dir = sprintf("/srv/uploads/%s", $user);
$filename = basename($_FILES['fileToUpload']['name']);
if( !preg_match('/^[\w_\.\-]+$/', $filename) ){
	echo "Invalid filename";
	exit;
}
$full_path = sprintf("/srv/uploads/%s/%s", $user, $filename);
if( move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $full_path) ){
	echo "worked";
}else{
	echo "failed";
}

  3  $dir = "/var/www/users/{$user}";
  4  if (is_dir($dir)) {
  5   if ($dh = opendir($dir)) {
  6    while (($file = readdir($dh)) !== false) {
  7     echo nl2br("filename: {$file}  . \n");
  8    }
  9    closedir($dh);
 10   }
 11  }


?>
