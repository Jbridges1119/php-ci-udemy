<?php
require 'conn.php';
session_start();


if (!$_SESSION['u_name']) {
  header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <!-- bring in nav bar LIKE A EJS PARTIAL-->
  <?php require 'nav.php'; ?>

  <ul>
    <li>
      <a href="add_new_employee.php">Add New Employee</a>
    </li>
    <li>
      <a href="dashboard.php">View All Employee</a>
    </li>
  </ul>

  <table border=1>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Details</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>

    <?php

    $sql = "SELECT * FROM employees";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {

      //output data of each row
      while ($employee = mysqli_fetch_assoc($result)) { ?>

        <tr>
          <td><?php echo $employee['e_id']; ?></td>
          <td><?php echo $employee['e_name']; ?></td>
          <!-- gets id of user and puts into url with ?e_id= -->
          <td><a href="single_employee.php?e_id=<?php echo $employee['e_id']; ?>">Details</a></td>
          <td><a href="single_employee_edit.php?e_id=<?php echo $employee['e_id']; ?>" >Edit</a></td>
          <td><a href="delete_employee.php?e_id=<?php echo $employee['e_id']; ?>" >Delete</a></td>
        </tr>

<?php

      }
    } else {
      echo "0 results";
    }
    ?>

  </table>


</body>

</html>