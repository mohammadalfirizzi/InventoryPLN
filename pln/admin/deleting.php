<?php
include 'include/koneksi.php';
$id = $_GET['id'];
$sql = "SELECT * FROM users WHERE id='$id'";
$result = $conn->query($sql);
$data = mysqli_fetch_array($result);
$result = mysqli_query($conn, "DELETE FROM users WHERE id=$id");
header("Location:user.php");
?>
