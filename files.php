<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>File Server</title>
    <style type=text/css>
 table {  
    font-family: Helvetica, Arial, sans-serif;
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
    if (!isset($_SESSION["user"])) {
        header("Location:http://ec2-52-14-191-6.us-east-2.compute.amazonaws.com/~wwick/git/spring2019-module2-group-455281-467000/login.html");
    }
    $user = $_SESSION["user"];
    $dir = "/srv/uploads/users/{$user}";
    if (is_dir($dir)) {
        if ($dh = opendir($dir)) {
            while (($file = readdir($dh)) !== false) {
                if ("." === $file) continue;
                if(".." === $file) continue;
            
                $_SESSION["file"] = $file;
                echo "<tr>";
                echo "<td>$file</td>";
                echo "<td><input type =\"button\" value=\"Download\"/></td>";
                echo "<td>";
                // echo "<form action=\"info.php\" id=\"delete\" method=\"POST\">";
                // echo "<input type =\"button\" value=\"Delete\" name=\"submit\">";
                echo "<a href=\"delete.php?file=$file\"><button>Delete</button></a>";
                // echo "</form>";
                echo "</td>";
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
<br>

<form action="abort.php" method="POST">
    <?php
        echo "You are now logged in as user ".$user;
    ?>
    <br>
    <p>Click "Logout" to return to the login page. </p>
    <input type="submit" value="Logout" name="submit">
    <?php
        session_abort();
    ?>
</form>

</body>
</html>



