<?php
 if($_POST['Submit']){
  $file = fopen("/srv/uploads/users.txt", 'a') or die("Unable to open file!");
  $user = $_POST['user'];
  $lines = file("/srv/uploads/users.txt");
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
   echo "User does not exist!";
  }else{
   header('Location:http://ec2-52-15-187-19.us-east-2.compute.amazonaws.com/~elijahpena/spring2019-module2-group-455281-467000/upload.html?user='.$user);

  }
  fclose($file);
  //echo "worked";


 }
?>
