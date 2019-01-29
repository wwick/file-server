<?php
session_start();
$user = $_SESSION["user"];

$dir = sprintf("/srv/uploads/%s", $user);
$filename = basename($_FILES['fileToUpload']['name']);
if(!preg_match('/^[\w_\.\-]+$/', $filename)){
  die("invalid filename");
}
$full_path = sprintf("/srv/uploads/%s/%s", $user, $filename);
if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $full_path)){
	echo "worked";
} else {
	echo "failed";
}

//   $dir = "/var/www/users/{$user}";
//   if (is_dir($dir)) {
//   if ($dh = opendir($dir)) {
//   while (($file = readdir($dh)) !== false) {
//   echo nl2br("filename: {$file}  . \n");
//   8    }
//   9    closedir($dh);
//  10   }
//  11  }

?>
