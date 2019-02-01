<?php

//$URL = "http://ec2-52-15-187-19.us-east-2.compute.amazonaws.com/~elijahpena/spring2019-module2-group-455281-467000/files.php";
//$URL = "http://ec2-52-14-191-6.us-east-2.compute.amazonaws.com/~wwick/git/spring2019-module2-group-455281-467000/files.php";

session_start();
if(isset($_POST['Submit'])) {
    //opens users.txt, which contains the list of usernames
    $file = fopen("/srv/uploads/users.txt", 'a') or die("Unable to open file!");
    $user = $_POST['user'];
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
    //posts error message and exits if user is not in the list of usernames
    if(!$exists) {
	die("User does not exist");
    }
    //sends users to their list of files
    $_SESSION["user"] = $user;
    header("Location:files.php");
}

?>
