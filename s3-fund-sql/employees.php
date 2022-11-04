<?php require 'conn.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>

  <?php

  $sql = "SELECT * FROM employees";
  $result = mysqli_query($conn, $sql);
  ?>
  <table border='1'>
    <tr>
      <td>ID</td>
      <td>Name</td>
      <td>Email</td>
      <td>Phone</td>
      <td>Details</td>
      <td>Update</td>
      <td>Delete</td>
    </tr>
    <?php
    //get the number of rows in result and checks if greater than 0
    if (mysqli_num_rows($result) > 0) {

      //loop through query - fetch echo array from query
      while ($employee = mysqli_fetch_assoc($result)) {
    ?>
        <tr>
          <td>
            <?php echo $employee['e_id']; ?>
          </td>
          <td>
            <?php echo $employee['e_name']; ?>
          </td>
          <td>
            <?php echo $employee['e_email']; ?>
          </td>
          <td>
            <?php echo $employee['e_phone']; ?>
          </td>
           <!-- redirects to details -->
          <td><a href="details.php?e_id=<?php echo $employee['e_id']; ?>">Details</a></td>
          <!-- redirects to update -->
          <td><a href="update.php?e_id=<?php echo $employee['e_id']; ?>">Update</a></td>
          <!-- executes delete.php -->
          <td><a href="delete.php?e_id=<?php echo $employee['e_id']; ?>">Delete</a></td>
        </tr>

    <?php
      }
    } else {
      echo '0 Results';
    }

    ?>

  </table>
</body>

</html>