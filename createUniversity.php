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

  $name = $_POST["uniName"];
  $desc = $_POST["descr"];
  $loc = $_POST["loc"];
  $numStudents = (int)$_POST["numStudents"];

  $sql = "INSERT into universities (name, location, description, numOfStudents) VALUES ('$name', '$desc', '$loc', '$numStudents')";

  if(!mysqli_query($conn, $sql))
  {
      echo "Not inserted";
  }
  else
  {
    echo "Inserted successfully";
    header("refresh:2; url=superadmin.php");
  }

 ?>
