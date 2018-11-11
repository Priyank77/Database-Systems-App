<?php

$servername = "localhost";
$username = "root";
$password = "";
$db = "cop4710";

$conn = mysqli_connect($servername, $username, $password, $db);
$sql = "SELECT * FROM events";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Events</title>
  </head>
  <body>
      <input type="reset" value="Sign Out" onclick="location.href='indexx.html'">
      <br></br>

      <form action="createEvent.php" method="post">
        Event Name: <input type="text" name="eventName">
                    <br></br>
        Event Category: <input type="text" name="eventCategory">
                    <br></br>
        Event Description: <input type="text" name="descr">
                    <br></br>
        Event Time: <input type="time" name="eventTime">
                    <br></br>
        Event Date: <input type="date" name="eventDate">
                    <br></br>
        Event Location: <input type="text" name="loc">
                    <br></br>
        Contact Phone: <input type="tel" name="phone">
                    <br></br>
        Contact Email: <input type="email" name="mail">
                    <br></br>
              <input type="submit" value="Create Event">
      </form>

      <table>
          <thead>
            <tr>
                <th>Name</th>
                <th>Category</th>
                <th>Description</th>
                <th>Time</th>
                <th>Date</th>
                <th>Location</th>
                <th>Phone</th>
                <th>Email</th>
            </tr>
            <?php while($row = mysqli_fetch_array($result)):;?>
            <tr>
                  <td><?php echo $row[1];?></td>
                  <td><?php echo $row[2];?></td>
                  <td><?php echo $row[3];?></td>
                  <td><?php echo $row[4];?></td>
                  <td><?php echo $row[5];?></td>
                  <td><?php echo $row[6];?></td>
                  <td><?php echo $row[7];?></td>
                  <td><?php echo $row[8];?></td>
            </tr>
          <?php endwhile;?>
        </thead>
      </table>

  </body>
</html>
