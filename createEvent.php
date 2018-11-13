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
  $time = $_POST["eventTime"];
  $date = $_POST["eventDate"];
  $loc = $_POST["loc"];
  $phone = $_POST["phone"];
  $email = $_POST["mail"];
  $rso = $_POST["rrssoo"];
  $uni = $_POST["uni"];

  $sql = "INSERT into events (name, category, description, EventTime, EventDate, location, phone, email, rso, university)
  VALUES ('$name', '$category', '$desc', '$time', '$date', '$loc', '$phone', '$email', '$rso', '$uni')";

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
