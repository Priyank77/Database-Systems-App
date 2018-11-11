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
    header("refresh:1;url=events.html");
}

 ?>
