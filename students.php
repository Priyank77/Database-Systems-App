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
              <?php echo "<td><a href=view.php?id=".$row['ID'].">View</a></td>"?>;
        </tr>
      <?php endwhile;?>
    </thead>
  </table>

  </body>
  </html>
