<?php
    session_start();
    if(!isset($_SESSION["user"])){
        header("Location:login.html");
    }
    $user = $_SESSION["user"];
    $file = $_REQUEST["file"];
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename='.basename($file));
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    ob_clean();
    flush();
//the above header information was recieved from https://stackoverflow.com/questions/11315951/using-the-browser-prompt-to-download-a-file
    $filepath = "/srv/uploads/users/".$user."/".$file;
    readfile($filepath);
    header("Location:files.php");
?>
