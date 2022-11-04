<!-- REQUIRED TO CONNECT OT DATABASE -->
<?php 
//connect to db
require 'conn.php';
//get id off url
$id = $_GET['e_id'];
//query statement
$sql = "DELETE FROM employees WHERE e_id = '$id'";

//if connected run query
if( mysqli_query($conn, $sql) ) {
  header('Location: dashboard.php');
} else {
  echo "Error deleting record: " . mysqli_error($conn);
}

?>