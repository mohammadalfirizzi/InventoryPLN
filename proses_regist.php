<?php

include 'koneksi.php';

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$password = md5($password);
$checkName = "SELECT * FROM users WHERE email = '$email'";
$run = mysqli_query($conn, $checkName);
$data = mysqli_fetch_array($run);

$sql = "INSERT INTO users (id, username, email,password) VALUES ('','$username', '$email', '$password')";
if ($data[0] > 0) {
	?>
<script>alert('Name already registered. Input a different name')
window.location = "regist.php";
</script>
   <?php
   exit();
} else {
mysqli_query($conn, $sql);
header("location:index.php");
}

?>
