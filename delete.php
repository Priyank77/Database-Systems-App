<?php

  $servername = "localhost";
  $username = "root";
  $password = "";
  $db = "cop4710";

  $conn = mysqli_connect($servername, $username, $password, $db);

  $id = (int)$_GET['id'];

  $sql = "DELETE FROM events WHERE ID = '$id'";

  if(mysqli_query($conn, $sql))
  {
      echo "Deleted successfully";
      header("refresh:1; url=eventss.php");
  }
  else
  {
      echo ("Error: " . mysqli_error($conn));
  }

 ?>
