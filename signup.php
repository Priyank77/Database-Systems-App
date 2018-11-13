<?php

$servername = "localhost";
$username = "root";
$password = "";
$db = "cop4710";

$conn = mysqli_connect($servername, $username, $password);

if(!$conn)
{
    echo "Not connected to server";
}
else {
  echo "Connected to server";
}

if(!mysqli_select_db($conn, $db))
{
    echo "Database Not Selected";
}
else{
  echo "Database selected";
}

$user = $_POST["username"];
$pass = $_POST["psw"];
$email = $_POST["email"];
$level = $_POST["level"];

$sql = "INSERT into users (username, password, email, level) VALUES ('$user', '$pass', '$email', '$level')";

if(!mysqli_query($conn, $sql))
{
    echo "Not inserted";
}
else
{
    echo "Inserted";
    header("refresh:2; url=indexx.html");
}

 ?>
