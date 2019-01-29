<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>File Server</title>
</head>
<body>

<table>
    <tr>
        <th>Filename</th>
        <th>Download</th>
        <th>Delete</th>
    </tr>
    <?php
    session_start();
    $user = $_SESSION["user"];
    $dir = "/srv/uploads/users/{$user}";
    if (is_dir($dir)) {
        if ($dh = opendir($dir)) {
            while (($file = readdir($dh)) !== false) {
                if ("." === $file) continue;
		if(".." === $file) continue;
		
		echo "<tr>";
                echo "<th>$file</th>";

                echo "<th><input type =\"button\">Download</input></th>";
                echo "<th><input type =\"button\">Delete</input></th>";
                // echo nl2br("filename: {$file}  . \n");
                echo "</tr>";      
            }
        closedir($dh);
        }
    }
    ?>
</table>

<form action="upload.php" method="post" enctype="multipart/form-data">
    Select a file to upload:
    <input type="file" name="fileToUpload">
    <input type="submit" value="Upload" name="submit">
</form> 

</body>
</html>



