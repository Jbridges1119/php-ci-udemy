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
  //GET from url
  $id = $_GET['e_id'];
  
  $sql = "SELECT * FROM employees WHERE e_id = $id";
  $result = mysqli_query($conn, $sql);
  ?>
  <p><a href="employees.php">Back to Employees</a></p>

<ul>

    <?php
    //get the number of rows in result and checks if greater than 0
    if (mysqli_num_rows($result) > 0) {

      //loop through query - fetch echo array from query
      while ($employee = mysqli_fetch_assoc($result)) {
    ?>
     
     <li><strong>Name:</strong><?php echo $employee['e_name']; ?></li>
     <li><strong>Email ID:</strong><?php echo $employee['e_email']; ?></li>
     <li><strong>Phone No:</strong><?php echo $employee['e_phone']; ?></li>
    <?php
      }
    } else {
      echo '0 Results';
    }

    ?>

</ul>
</body>

</html>