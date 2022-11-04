<?php
//DON'T NEED SESSION - THINK OF THIS AS A PARTIAL LIKE EJS

if( !$_SESSION['u_name']) {
  header('Location: index.php');
}
?>


<h3>Welcome <?php echo $_SESSION['u_name']; ?> </h3>
  <p><a href="logout.php">Log Out</a></p>