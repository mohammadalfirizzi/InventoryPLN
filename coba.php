<?php
include 'koneksi.php';
$login = mysqli_query($conn, "SELECT * FROM users");
$data = mysqli_fetch_array($login);
if(!isset($_SESSION))
   {
       session_start();
       echo $_SESSION = $email;
   }
   echo $data['username'];
?>
