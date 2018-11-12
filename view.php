<?php

  $servername = "localhost";
  $username = "root";
  $password = "";
  $db = "cop4710";

  $conn = mysqli_connect($servername, $username, $password, $db);

  $id = (int)$_GET['id'];

  $sql = "SELECT * FROM events WHERE ID = '$id'";
  $result = mysqli_query($conn, $sql);
 ?>

 <html>
  <head>
    <title>Event</title>
  </head>
  <body>
    <?php

      echo "<table>";
      while($row = mysqli_fetch_array($result))
      {
          echo "<label>Event Name: " .$row['name']. "</label>";
          echo "<br></br>";
          echo "<label>Event Category: " .$row['category']. "</label>";
          echo "<br></br>";
          echo "<label>Event Description: " .$row['description']. "</label>";
          echo "<br></br>";
          echo "<label>Event Date: " .$row['EventDate']. "</label>";
          echo "<br></br>";
          echo "<label>Event Time: " .$row['EventTime']. "</label>";
          echo "<br></br>";
          echo "<label>Event Location: " .$row['location']. "</label>";
          echo "<br></br>";
          echo "<label>Contact Phone: " .$row['phone']. "</label>";
          echo "<br></br>";
          echo "<label>Contact Email: " .$row['email']. "</label>";
      }

     ?>
