<?php

$servername = "localhost";
$username = "root";
$password = "";
$db = "cop4710";

$conn = mysqli_connect($servername, $username, $password, $db);
$sql = "SELECT * FROM universities";
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

      <form action="createUniversity.php" method="post">
        University Name: <input type="text" name="uniName">
                    <br></br>
        University Description: <input type="text" name="descr">
                    <br></br>
        University Location: <input type="text" name="loc">
                    <br></br>
        Number of Students: <input type="number" name="numStudents">
                    <br></br>
              <input type="submit" value="Create University">
      </form>

      <table callspacing="100">
          <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Location</th>
                <th>Number of Students</th>
            </tr>
            <?php while($row = mysqli_fetch_array($result)):;?>
            <tr>
                  <td><?php echo $row[0];?></td>
                  <td><?php echo $row[1];?></td>
                  <td><?php echo $row[2];?></td>
                  <td><?php echo $row[3];?></td>
                  <td><?php echo $row[4];?></td>
                  <?php echo "<td><a href=deleteUniversity.php?id=".$row['ID'].">Delete</a></td>"?>;
            </tr>
          <?php endwhile;?>
        </thead>
      </table>

  </body>
</html>
