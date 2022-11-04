<?php require 'conn.php'; 
session_start();

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
  

<form action="" method="POST">

  <input type="text" name="u_name" required placeholder="Username">
  <input type="password" name="u_pass" required placeholder="Password">
  <input type="submit" name="u_login" required value="Login">
  
  <a href="register.php">Register</a>

<?php

if( isset($_POST['u_login']) ) {
  $u_name = $_POST['u_name'];
  $u_pass = md5($_POST['u_pass']);

  $sql = "SELECT * FROM users WHERE u_name='$u_name'";
  $result = mysqli_query( $conn, $sql );

  if( mysqli_num_rows($result) > 0) {
    //output data of each row
    while($user = mysqli_fetch_assoc($result)) {
      if( $u_name == $user['u_name'] && $u_pass == $user['u_pass'] ) {
        $_SESSION['u_name'] = $u_name;
        header('Location: dashboard.php');
      } else {
        echo 'Wrong input';
      }
    }
  } else {
    echo "0 results";
  }

}

?>
</body>
</html>