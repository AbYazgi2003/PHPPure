<?php
$server_name = 'localhost';
$user_name = 'root';
$pass_word = '';
$dbname = 'web2finalproject';

$conn = new mysqli ($server_name,$user_name,$pass_word,$dbname);

if(mysqli_connect_error()){
die("DB Connection Failure : ".mysqli_connect_error());    
}

?>