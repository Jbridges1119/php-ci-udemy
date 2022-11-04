<?php require 'conn.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  

<form action="" method="POST">
<input type="text" name="u_email" required placeholder="Email">
  <input type="text" name="u_name" required placeholder="Username">
  <input type="password" name="u_pass" required placeholder="Password">
  <input type="submit" name="u_reg" required value="Register">
  
  <a href="index.php">Login</a>

<?php 

if( isset($_POST['u_reg']) ) {
  $u_email = $_POST['u_email'];
  $u_name = $_POST['u_name'];
  $u_pass = md5($_POST['u_pass']);

  $sql = "INSERT INTO users (u_email, u_name, u_pass) VALUES ( '$u_email', '$u_name', '$u_pass')";

  if( mysqli_query($conn, $sql) ) {
    echo "<script>alert('New record added')</script>";
  } else {
    echo "Error: " . $sql . "<br>" .mysqli_error($conn);
  }

}
?>

</body>
</html>