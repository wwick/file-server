<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>File Server</title>
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<div id="main"><div class="container"><div class="center">
<body>

<?php
    session_start();
    $user = $_SESSION["user"];
    $dir = "/srv/uploads/users/{$user}";
    if(($file = readdir($dh)) == false){
        echo "<p> There are no files to display, try uploading some :) </p>";
    }
    else{
        echo "
        <table>
    <thead>
    <tr>
        <th>Filename</th>
        <th>Download</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody>
    ";
    }
?>


    <?php
    session_start();
    if (!isset($_SESSION["user"])) {
        header("Location:login.html");
    }
    $user = $_SESSION["user"];
    $dir = "/srv/uploads/users/{$user}";
    if (is_dir($dir)) {
        if ($dh = opendir($dir)) {
            while (($file = readdir($dh)) !== false) {
                if ("." === $file) continue;
                if(".." === $file) continue;
            
                echo "<tr>";
                echo "<td>$file</td>";
                echo "<td><a href=\"download.php?file=$file\"><button class =\"button button2\">Download</button></a></td>";                
                echo "<td><a href=\"delete.php?file=$file\"><button class=\"button button1\">Delete</button></a></td>";
                echo "</tr>";
            }
        closedir($dh);
        }
    }
    ?>
    </tbody>
</table>
<br>
<!-- form to upload file  -->
<form action="upload.php" method="POST" enctype="multipart/form-data">
    Select a file to upload (max = 100 MB):
    <input type="file" name="fileToUpload">
    <input type="submit" value="Upload" name="submit">
</form>
<br>

    <p>
    <?php
        echo "You are now logged in as user \"{$user}\".";
    ?>
    Click "Logout" to return to the login page. </p>
<a href="abort.php"><button class="button button3">Logout</button></a>
</body></div></div></div>
</html>



