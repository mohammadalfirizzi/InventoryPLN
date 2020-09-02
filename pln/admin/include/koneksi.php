<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pln";

$conn = mysqli_connect($servername,$username,$password,$dbname);

if(!$conn){
	die("Koneksi gagal");
}
else {
	echo "";
}
?>