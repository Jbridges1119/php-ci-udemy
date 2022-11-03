<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <!--  -->
  <form method="POST" action=""> 
    <table>
      <tr>
        <td>Username: </td>
        <td><input type='text' name="u_name"></td>
      </tr>
      <tr>
        <td>Password: </td>
        <td><input type='password' name="u_pass"></td>
      </tr>
      <tr>
        <td></td>
        <td><input type='submit' name="u_login"></td>
      </tr>
    </table>
  </form>

<?php
//until submit is clicked will not set - Prevents error "undefined variable"
if(isset($_POST['u_login'])) {

//this matches with u_name input
$u_name = $_POST['u_name'];
//this matches with u_pass input - one way to encrypt md5
$u_pass = md5($_POST['u_pass']);


echo $u_name;
echo '<br>';
echo $u_pass;
}
?>
</body>
</html>