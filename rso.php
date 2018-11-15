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
        RSO Admin Email: <input type="email" name="mail">
                    <br></br>
        RSO Email 2: <input type="email" name="mail2">
                    <br></br>
        RSO Email 3: <input type="email" name="mail3">
                    <br></br>
        RSO Email 4: <input type="email" name="mail4">
                    <br></br>
        RSO Email 5: <input type="email" name="mail5">
                    <br></br>
              <input type="submit" value="Create RSO">
      </form>

      <table callspacing="100">
          <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Admin</th>
                <th>Admin Email</th>
            </tr>
            <?php while($row = mysqli_fetch_array($result)):;?>
			<tr>
				  <td><?php echo $row[0];?></td>
				  <td><?php echo $row[1];?></td>
				  <td><?php echo $row[2];?></td>
				  <td><?php echo $row[3];?></td>
				  <?php echo "<td><a href=deleterso.php?id=".$row['id'].">Delete</a></td>"?>;
			</tr>
			<?php endwhile;?>
        </thead>
      </table>

  </body>
</html>
