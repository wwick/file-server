<?php
 if($_POST['Submit']){
  $file = fopen("/var/www/users/user.txt", 'a+') or die("Unable to open file!");
  $user = $_POST['user'];
  $lines = file("/var/www/users/user.txt");
  $exists = 0;
  foreach ($lines as $line_num => $line) {
   if($line == $user."\n"){
    echo nl2br("user exists\n");
    $exists = 1;
    break;
   } else {
    //fwrite($file, $user);
    //echo "user created";
   }
   //echo $line . "<br/>\n";
  }
  if(!$exists){
   fwrite($file, $user."\n");
   $filePath = "/var/www/users/{$user}";
   echo nl2br("user created\n");
   mkdir($filePath);
  }
  fclose($file);
  $filePath = $filePath . '/hello.txt';
  //$testing = fopen($filePath, 'a+') or die("Unable to open file!");
  //fclose($file);
  header('Location:http://ec2-52-15-187-19.us-east-2.compute.amazonaws.com/~elijahpena/tempFile/files.php?user='.$user);
  //echo "worked";


 }
?>
