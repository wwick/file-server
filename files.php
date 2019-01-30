<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>File Server</title>
    <style type=text/css>
 table {  
    font-family: Helvetica, Arial, sans-serif; /* Nicer font */
    font-weight: lighter;
    width: 640px; 
    border-collapse: collapse;
    border-spacing: 0; 
}

td, th {
    border: 1px solid #CCC;
    height: 30px;
    text-align: center;
 }

thead {  
    background: Blue;
    font-weight: bold;
    color: White;
}

tbody {
    background: LightGray;
}
    </style>
</head>
<body>

<table>
    <thead>
    <tr>
        <th>Filename</th>
        <th>Download</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody>
    <?php
    session_start();
    if !(isset($_SESSION["user"])) {
        die("username not supplied");
    }
    $user = $_SESSION["user"];
    $dir = "/srv/uploads/users/{$user}";
    if (is_dir($dir)) {
        if ($dh = opendir($dir)) {
            while (($file = readdir($dh)) !== false) {
                if ("." === $file) continue;
                if(".." === $file) continue;
            
                echo "<tr>";
                echo "<th>$file</th>";
                echo "<th><input type =\"button\" value=\"Download\"/></th>";
                echo "<th><input type =\"button\" value=\"Delete\"/></th>";
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
    Select a file to upload:
    <input type="file" name="fileToUpload">
    <input type="submit" value="Upload" name="submit">
</form> 

</body>
</html>



