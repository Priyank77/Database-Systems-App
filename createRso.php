<?php

  $servername = "localhost";
  $username = "root";
  $password = "";
  $db = "cop4710";

  $conn = mysqli_connect($servername, $username, $password, $db);

  if(!$conn)
  {
      echo "Not connected";
  }

  $name = $_POST["rsoName"];
  $admin = $_POST["admin"];
  $email = $_POST["mail"];

  $sql = "INSERT into rso (name, admin, email) VALUES ('$name', '$admin', '$email')";

  if(!mysqli_query($conn, $sql))
  {
      echo "Not inserted";
  }
  else
  {
    echo "Inserted successfully";
    header("refresh:2; url=rso.php");
  }

 ?>
