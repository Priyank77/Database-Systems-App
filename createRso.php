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
  $email2 = $_POST["mail2"];
  $email3 = $_POST["mail3"];
  $email4 = $_POST["mail4"];
  $email5 = $_POST["mail5"];

  $sql = "INSERT into rso (name, admin, email, email2, email3, email4, email5) VALUES ('$name', '$admin', '$email', '$email2', '$email3', '$email4', '$email5')";
  
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
