<?php

$server_name = 'localhost';
$user_name = 'root';
$pass_word = '';
$db = 'demo';

$conn = mysqli_connect($server_name, $user_name, $pass_word);



if( !$conn ){
  die( 'Unable to connect' );
} else {
  echo 'Connected';
}

?>