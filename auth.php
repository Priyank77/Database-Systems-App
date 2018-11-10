<?php

  $inData = getRequestInfo();

  $id = 0;
  $firstName = "";
  $lastName = "";
  $working = "None";

  $servername = "localhost";
  $username = "root";
  $password = "";
  $db = "cop4710";

  $hashed_unver_pass = crypt($inData["password"], "CRYPT_BLOWFISH");

  $conn = new mysqli($servername, $username, $password, $db);

  if($conn->connect_error)
  {
      returnWithError($conn->connect_error);
  }
  else
  {
      $sql = $conn->prepare("SELECT username, password FROM users where username = ? and password = ?");
      $sql->bind_param("ss", $inData["login"], $hashed_unver_pass);
      $sql->execute();
      $result = $sql->get_result();

      if($result->num_rows > 0)
      {
          $row = $result->fetch_assoc();
          $user = $row["username"];
          $pass = $row["password"];
          returnWithInfo($user, $pass);
      }
      else
      {
          returnWithError("No Records Found");
      }
      $conn->close();
  }

  function getRequestInfo()
  {
      return json_decode(file_get_contents("php://input"), true);
  }

  function sendResultInfoAsJson($obj)
  {
      header("Content-type: application/json");
      echo $obj;
  }

  function returnWithError($err)
  {
      $returnVal = '{"user":"", "pass":"", "error":"'. $err . '"}';
      sendResultInfoAsJson($returnVal);
  }

  function returnWithInfo($user, $pass)
  {
      $my_arr[] = array(
          "user" => $user,
          "pass" => $pass,
          "error" => "None"
      );
      $json = json_decode($my_arr);
      sendResultInfoAsJson($json);
  }
 ?>
