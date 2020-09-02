<?php
include 'include/koneksi.php';
$id = $_POST['id'];
$judul = $_POST['judul'];
$nama_pt = $_POST['nama_pt'];
$kon_awal = $_POST['kon_awal'];
$kon_akhir = $_POST['kon_akhir'];
$status = $_POST['status'];
$namaFile = $_FILES['file']['name'];
$namaSementara = $_FILES['file']['tmp_name'];

// tentukan lokasi file akan dipindahkan
$dirUpload = "file/";

// pindahkan file
$terupload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);

$ganti = "UPDATE rent set judul='$judul', nama_pt='$nama_pt', kon_awal='$kon_awal', kon_akhir='$kon_akhir', file='$namaFile',status='$status' where id='$id'";

$update = $conn->query($ganti);

if($update) {
	header("location:panela.php");
	//echo "Berhasil";
}else{
	echo $ganti;
	echo "gagal mengubah data";
}
?>
