<?php

$servername = "localhost";
$username = "root";
$password = "";
$db = "cop4710";

$conn = mysqli_connect($servername, $username, $password, $db);
$sql = "SELECT * FROM events";
$result = mysqli_query($conn, $sql);

$sql_u = "SELECT name FROM universities";
$result_u = mysqli_query($conn, $sql_u);

$sql_r = "SELECT name FROM rso";
$result_r = mysqli_query($conn, $sql_r);
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Events</title>
  </head>
  <body>
      <input type="reset" value="Sign Out" onclick="location.href='indexx.html'">
      <br></br>

      <input type="submit" value="Create RSO" onclick="location.href='rso.php'">

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
        RSO: <select value="rsos" name="rrssoo">
          <?php while($row_r  =mysqli_fetch_array($result_r)):;?>
            <option value="<?php echo $row_r[0];?>"><?php echo $row_r['name'];?></option>
          <?php endwhile;?>
          </select>
          <br></br>
        University: <select value="University" name="uni">
        <?php while($row_u = mysqli_fetch_array($result_u)):;?>
          <option value="<?php echo $row_u[0];?>"><?php echo $row_u['name'];?></option>
        <?php endwhile;?>
      </select>
              <input type="submit" value="Create Event">
      </form>

      <table callspacing="100">
          <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Category</th>
                <th>Description</th>
                <th>Time</th>
                <th>Date</th>
                <th>Location</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Rso</th>
                <th>University</th>
            </tr>
            <?php while($row = mysqli_fetch_array($result)):;?>
            <tr>
                  <td><?php echo $row[0];?></td>
                  <td><?php echo $row[1];?></td>
                  <td><?php echo $row[2];?></td>
                  <td><?php echo $row[3];?></td>
                  <td><?php echo $row[4];?></td>
                  <td><?php echo $row[5];?></td>
                  <td><?php echo $row[6];?></td>
                  <td><?php echo $row[7];?></td>
                  <td><?php echo $row[8];?></td>
                  <td><?php echo $row[9];?></td>
                  <td><?php echo $row[10];?></td>
                  <?php echo "<td><a href=delete.php?id=".$row['ID'].">Delete</a></td>"?>;
            </tr>
          <?php endwhile;?>
        </thead>
      </table>

  </body>
</html>
