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

  <form action="" method="POST">

    <?php
    //get the number of rows in result and checks if greater than 0
    if (mysqli_num_rows($result) > 0) {

      //loop through query - fetch echo array from query
      while ($employee = mysqli_fetch_assoc($result)) {
    ?>

       
        <table>
          <tr>
            <td>Name: </td>
            <td><input type='text' name="e_name" required value="<?php echo $employee['e_name']; ?>"></td>
          </tr>
          <tr>
            <td>Email: </td>
            <td><input type='email' name="e_email" required value="<?php echo $employee['e_email']; ?>"></td>
          </tr>
          <tr>
            <td>Phone: </td>
            <td><input type='tel' name="e_phone" required value="<?php echo $employee['e_phone']; ?>"></td>
          </tr>
          <tr>
            <td></td>
            <td><input type='submit' name="e_update"></td>
          </tr>
        </table>

    <?php

      }
    } else {
      echo '0 Results';
    }
    if(isset($_POST['e_update']) ){
    $e_name = $_POST['e_name'];
    $e_email = $_POST['e_email'];
    $e_phone = $_POST['e_phone'];

    $sql = "UPDATE employees SET e_name = '$e_name', e_email = '$e_email', e_phone = '$e_phone' WHERE e_id = '$id'";

      //Checks conn and query then does query
  if (mysqli_query($conn, $sql)) {
    //REDIRECT - To update form fields after update submit
    header('Location: employees.php');

  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
    }
    ?>

  </form>
</body>

</html>