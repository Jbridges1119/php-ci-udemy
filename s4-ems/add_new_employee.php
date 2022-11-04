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

<form action="" method='POST'>
  <input type="text" name="e_name"placeholder="Employee Name" required>
  <input type="text" name="e_email"placeholder="Employee Email" required>
  <input type="tel" name="e_phone"placeholder="Employee Phone Number" required>
  <input type="submit" value="Add Employee" name="e_add">
</form>

  </table>
  <?php
if ( isset($_POST['e_add'])) {
  $e_name = $_POST['e_name'];
  $e_email = $_POST['e_email'];
  $e_phone = $_POST['e_phone'];

  $sql = "INSERT INTO employees (e_name, e_email, e_phone) VALUES ('$e_name', '$e_email', '$e_phone')";

  if ( mysqli_query( $conn, $sql ) ){
    echo "<script>alert('Employee Added');</script>";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}


?>
</body>

</html>