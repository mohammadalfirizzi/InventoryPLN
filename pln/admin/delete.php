<?php
include 'include/koneksi.php';
$id = $_GET['id'];
$sql = "SELECT * FROM rent WHERE id='$id'";
$result = $conn->query($sql);
$data = mysqli_fetch_array($result);
$result = mysqli_query($conn, "DELETE FROM rent WHERE id=$id");
header("Location:panela.php");
?>
