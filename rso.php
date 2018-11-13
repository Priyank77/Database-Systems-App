<?php

$servername = "localhost";
$username = "root";
$password = "";
$db = "cop4710";

$conn = mysqli_connect($servername, $username, $password, $db);
$sql = "SELECT * FROM rso";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
  <head>
    <title>RSOs</title>
  </head>
  <body>
      <input type="reset" value="Sign Out" onclick="location.href='indexx.html'">
      <br></br>

      <input type="submit" value="Back to Events" onclick="location.href='eventss.php'">
      <br></br>

      <form action="createRso.php" method="post">
        RSO Name: <input type="text" name="rsoName">
                    <br></br>
        RSO Admin: <input type="text" name="admin">
                    <br></br>
        RSO Email: <input type="email" name="mail">
                    <br></br>
              <input type="submit" value="Create RSO">
        RSO Student Emails: <input type="email" name="studmail"
      </form>

      <table callspacing="100">
          <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Admin</th>
                <th>Email</th>
            </tr>
            <?php while($row = mysqli_fetch_array($result)):;?>
            <tr>
                  <td><?php echo $row[0];?></td>
                  <td><?php echo $row[1];?></td>
                  <td><?php echo $row[2];?></td>
                  <?php echo "<td><a href=deleterso.php?id=".$row['ID'].">Delete</a></td>"?>;
            </tr>
          <?php endwhile;?>
        </thead>
      </table>

  </body>
</html>
