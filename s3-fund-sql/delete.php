<!-- REQUIRED TO CONNECT OT DATABASE -->
<?php 

require 'conn.php';
$id = $_GET['e_id'];

$sql = "DELETE FROM employees WHERE e_id = '$id'";

if( mysqli_query($conn, $sql) ) {
  header('Location: employees.php');
} else {
  echo "Error deleting record: " . mysqli_error($conn);
}

?>