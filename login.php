<?php

$servername = "localhost";
$username = "root";
$password = "";
$db = "cop4710";

$mysqli = mysqli_connect($servername, $username, $password, $db);

$user = $_POST["user"];
$pass = $_POST["pass"];

$result = $mysqli->query("SELECT * FROM users WHERE username = '$user' AND password = '$pass'");

if($result->num_rows == 0)
{
    echo "Invalid login.";
}
else
{
    while($fieldinfo = mysqli_fetch_array($result))
    {
      if($fieldinfo['level'] == "Admin")
      {
        header("refresh:1;url=eventss.php");
      }
      else if($fieldinfo['level'] == "Student")
      {
          header("refresh:1;url=students.php");
      }
      else if($fieldinfo['level'] == "Superadmin")
      {
          header("refresh:1;url=superadmin.php");
      }
    }
}

 ?>
