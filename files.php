<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>File Server</title>
</head>
<body>


    <form action="upload.php" method="post" enctype="multipart/form-data">
        Select a file to upload:
        <input type="file" name="fileToUpload">
        <input type="submit" value="Upload" name="submit">
    </form> 
    <?php

    session_start();
    $user = $_SESSION["user"];
    $dir = "/srv/users/{$user}";
    if (is_dir($dir)) {
        if ($dh = opendir($dir)) {
            while (($file = readdir($dh)) !== false) {
                echo nl2br("filename: {$file}  . \n");
            }
        closedir($dh);
        }
    }
?>
</body>
</html>



