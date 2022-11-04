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

  <?php
    $id = $_GET['e_id'];
    $sql = "SELECT * FROM employees WHERE e_id='$id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {

      //output data of each row
      while ($employee = mysqli_fetch_assoc($result)) { ?>

<form action="" method='POST'>
  <input type="text" name="e_name"placeholder="Employee Name" required value=<?php echo $employee['e_name'];?>>
  <input type="text" name="e_email"placeholder="Employee Email" required value=<?php echo $employee['e_email'];?>>
  <input type="tel" name="e_phone"placeholder="Employee Phone Number" required value=<?php echo $employee['e_phone'];?>>
  <input type="submit" value="Edit Employee" name="e_edit">
</form>

<?php

}
} else {
echo "0 results";
}
?>

  <?php
if ( isset($_POST['e_edit'])) {
  $e_name = $_POST['e_name'];
  $e_email = $_POST['e_email'];
  $e_phone = $_POST['e_phone'];

  $sql = "UPDATE employees SET e_name = '$e_name', e_email = '$e_email', e_phone = '$e_phone' WHERE e_id = '$id'";

  if ( mysqli_query( $conn, $sql ) ){
    header('Location: dashboard.php');
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}


?>
</body>

</html>