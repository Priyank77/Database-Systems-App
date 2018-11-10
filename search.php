<?php

  $searchResults = "";
  $searchCount = 0;

  $servername = "localhost";
  $username = "root";
  $password = "";
  $db = "cop4710";
  $count = 0;
  $search_val = $_POST["search"];
  $current_user = $_POST["current_user"];


  $conn = mysqli_connect($servername, $username, $password, $db);
  if($conn->connect_error)
  {
      echo($conn->connect_error);
  }
  else
  {
      $sql = $conn->prepare("SELECT * FROM events WHERE (eventName LIKE CONCAT(?, '%'))");
      $sql->bind_param("sss", $search_val, $search_val, $current_user);
      $sql->execute();
      $result = $sql->get_result();
      $my_arr = array();
      if($result->num_rows > 0)
      {
          while($row = $result->fetch_assoc())
          {
              $my_arr[] = array(
                  "eventName" => $row["eventName"];
                  "eventCategory" => $row["eventCategory"];
                  "desc" => $row["desc"];
                  "time" => $row["time"];
                  "date" => $row["date"];
                  "contactPhone" => $row["contactPhone"];
                  "contactEmail" => $row["contactEmail"];
              );
              $count++;
          }
          echo json_decode($my_arr);
      }
      else
      {
          echo("fail");
      }
      $conn->close();
  }

 ?>
