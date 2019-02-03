<?php

session_start();
$user = $_POST['user'];

if(isset($_POST['Submit']) and $user != "") {
    //opens users.txt, which contains the list of usernames
    $file = fopen("/srv/uploads/users.txt", 'a+') or die("Unable to open file!");
    $lines = file("/srv/uploads/users.txt");
    $exists = false;
    //checks that the user is in the list of usernames
    foreach ($lines as $line_num => $line) {
        if($line == $user."\n"){
            $exists = true;
            break;
        }
    }
    //adds user if user did not previously exist
    if(!$exists){
        if(preg_match('/^[\w_\-]+$/', $user)) {
	    fwrite($file, $user."\n");
            $path = "/srv/uploads/users/{$user}";
            mkdir($path);
        } else {
            header("Location:login.html");
        }
    }
    //sends users to their list of files
    $_SESSION["user"] = $user;
    fclose($file);
    header("Location:files.php");
} else {
    header("Location:login.html");
}

?>
