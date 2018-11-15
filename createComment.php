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

  $name = $_POST["commentName"];
  $email = $_POST["commentEmail"];
  $comment = $_POST["comment"];

  $sql_c = "INSERT into comments (name, email, comment) VALUES ('$name', '$email', '$comment')";
  
  if(!mysqli_query($conn, $sql_c))
  {
      echo "Not inserted";
  }
  else
  {
    echo "Inserted successfully";
    header("refresh:2; url=eventss.php");
  }

 ?>
