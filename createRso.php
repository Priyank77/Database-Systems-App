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

  $name = $_POST["eventName"];
  $category = $_POST["eventCategory"];
  $desc = $_POST["descr"];

  $sql = "INSERT into rso (name, category, description)
  VALUES ('$name', '$category', '$desc')";

  if(!mysqli_query($conn, $sql))
  {
      echo "Not inserted";
  }
  else
  {
    echo "Inserted successfully";
    header("refresh:2; url=eventss.php"); 
  }

 ?>
