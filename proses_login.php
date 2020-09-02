<?php
session_start();
include 'koneksi.php';

$email = $_POST['email'];
$password = $_POST['password'];
$password = md5($password);

$login = mysqli_query($conn, "SELECT * FROM users where email = '$email' and password = '$password' and active = 'active'");
$cek = mysqli_num_rows($login);

if($cek == 1){
  $data = mysqli_fetch_assoc($login);
  if ($data['role']=="super admin") {
      $_SESSION['email'] = $email;
      $_SESSION['role'] = "super admin";
    	$_SESSION['status'] = "login";
      //header("location:coba.php");
      header("location:pln/admin/panela.php");
  }
  elseif ($data['role']=="admin") {
      $_SESSION['email'] = $email;
      $_SESSION['role'] = "admin";
    	$_SESSION['status'] = "login";
      header("location:pln/admin/panela.php");
  }
  elseif ($data['role']=="user") {
      $_SESSION['email'] = $email;
      $_SESSION['role'] = "user";
    	$_SESSION['status'] = "login";
      header("location:pln/admin/panela.php");
  }
  else {
      $_SESSION['email'] = $email;
      $_SESSION['role'] = "perusahaan";
    	$_SESSION['status'] = "login";
      header("location:pln/admin/panela.php");
  }
}
else {
  header("location:index.php");
}
?>
