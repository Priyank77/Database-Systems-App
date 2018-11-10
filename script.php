<?php

  if(isset($_POST["action"]) && !empty($_POST["action"]))
  {
      $action = $_POST["action"];

      switch($action)
      {
          case "create" : create_user(); break;
          case "add" : add_event(); break;
          case "populate" : populate_table(); break;
          case "delete" : delete_event(); break;
      }
  }

  function populate_table()
  {
      $servername = "localhost";
      $username = "root";
      $password = "";
      $db = "cop4710";

      $current_user = $_POST['current_user'];

      $conn = mysqli_connect($servername, $username, $password, $db);

      if(!$conn)
      {
          die("Error, could not connect");
      }

      $sql = $conn->prepare("SELECT eventName, eventCategory, desc, time, date, loc, contactPhone, contactEmail FROM events");
      $sql->bind_param("s", $current_user);

      $sql->execute();
      $result = $sql->get_result();

      $my_arr = array();

      while($row = $result->fetch_assoc())
      {
          $my_arr[] = array(
              'eventName' => $row["eventName"];
              'eventCategory' => $row["eventCategory"];
              'desc' => $row["desc"];
              'time' => $row["time"];
              'date' => $row["date"];
              'loc' => $row["loc"];
              'contactPhone' => $row["contactPhone"];
              'contactEmail' => $row["contactEmail"];
          );
      }
      echo json_encode($my_arr);
      $conn->close();
      $sql->close();
  }

  function create_user()
  {
      $username = $_POST["username"];
      $password = $_POST["password"];
      $email = $_POST["email"];

      $servername = "localhost";
      $username = "root";
      $password = "";
      $db = "cop4710";

      $conn = mysqli_connect($servername, $username, $password, $db);

      if(!$conn)
      {
          die("Error, could not connect:");
      }

      $sql = $conn->prepare("SELECT username, password FROM users");
      $sql->bind_param("s", $user);
      $sql->execute();
      $result = $sql->get_result();

      if(!$result)
        echo "Error";

        $row = $result->fetch_assoc();
        $contains_username = $row["username"];

        if($contains_username == $username)
          echo "Username already exists";

        $hashed_pass = crypt($pass, "CRYPT_BLOWFISH");

        $sql = $conn->prepare("INSERT into users (username, password, email) VALUES (?, ?, ?)");
        $sql->bind_param("sss", $username, $hashed_pass, $email);
        $sql->execute();

        if($sql)
          echo "Verified";

        $sql->close();
        $conn->close();
  }

  function add_event()
  {
      $servername = "localhost";
      $username = "root";
      $password = "";
      $db = "cop4710";

      $event_json = $_POST["eventObj"];
      $event_info = json_decode($event_json);

      $conn = mysqli_connect($servername, $username, $password, $db);

      $current_user = $_POST['current_user'];

      if(!$conn)
        die("Error, could not connect:");

      if($event_info)
      {
          $new_eventName = $event_info->eventName;
          $new_eventCategory = $event_info->eventCategory;
          $new_desc = $event_info->desc;
          $new_time = $event_info->time;
          $new_date = $event_info->date;
          $new_loc = $event_info->loc;
          $new_contactPhone = $event_info->contactPhone;
          $new_contactEmail = $event_info->contactEmail;

          $sql = $conn->prepare("INSERT into events(eventName, eventCategory, desc, time, date, loc, contactPhone, contactEmail) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
          $sql->bind_param("sssssssss", $new_eventName, $new_eventCategory, $new_desc, $new_time, $new_date, $new_loc, $new_contactPhone, $new_contactEmail, $current_user);
          $sql->execute();

          if(!$sql)
            echo "Fatal Error";
        }

        $sql->close();
        $conn->close();
  }

  function delete_event()
  {
      $servername = "localhost";
      $username = "root";
      $password = "";
      $db = "cop4710";

      $eventName = $_POST["eventName"];
      $current_user = $_POST["current_user"];

      $conn = mysqli_connect($servername, $username, $password, $db);

      if(!$conn)
        die("Error, could not connect.");

      $sql = $conn->prepare("DELETE from contacts WHERE eventName = ?")
      $sql->bind_param("ss", $eventName, $current_user);
      $sql->execute();

      if(!$sql)
        echo "Fatal Error";

      $sql->close();
      $conn->close();
  }

 ?>
