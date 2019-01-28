<?php
$filename = basename($_FILES['fileToUpload']['name']);
if( !preg_match('/^[\w_\.\-]+$/', $filename) ){
	echo "Invalid filename";
	exit;
}
$full_path = sprintf("/srv/uploads/%s", $filename);
if( move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $full_path) ){
	echo "worked";
}else{
	echo "failed";
}

?>
