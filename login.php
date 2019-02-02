<?php

session_start();
$user = $_POST['user'];

if(isset($_POST['Submit']) and $user != "") {
    //opens users.txt, which contains the list of usernames
    $file = fopen("/srv/uploads/users.txt", 'a+') or die("Unable to open file!");
    $lines = file("/srv/uploads/users.txt");
    fclose($file);
    $exists = 0;
    //checks that the user is in the list of usernames
    foreach ($lines as $line_num => $line) {
        if($line == $user."\n"){
            $exists = 1;
            break;
        }
    }
    //adds user if user did not previously exist
    if(!$exists) {
	fwrite($file, $user."\n");
        $path = "/srv/uploads/users/{$user}";
        mkdir($path);
    }
    //sends users to their list of files
    $_SESSION["user"] = $user;
    header("Location:files.php");
} else {
    header("Location:login.html");
}

?>
