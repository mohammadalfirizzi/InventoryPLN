<?php
include 'include/koneksi.php';
$judul_kontrak = $_POST ['judul'];
$nama_pt = $_POST ['nama_pt'];
$kon_awal = $_POST ['kon_awal'];
$kon_akhir = $_POST ['kon_akhir'];
//$file = $_POST ['file'];
$namaFile = $_FILES['file']['name'];
$namaSementara = $_FILES['file']['tmp_name'];

// tentukan lokasi file akan dipindahkan
$dirUpload = "file/";

// pindahkan file
$terupload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);

if ($terupload) {
    //echo "Upload berhasil!<br/>";
    //echo "Link: <a href='".$dirUpload.$namaFile."'>".$namaFile."</a>";
} else {
    //echo "Upload Gagal!";
}
        $query = "INSERT INTO rent( id, judul, nama_pt, kon_awal, kon_akhir, file) values ('','$judul_kontrak', '$nama_pt','$kon_awal',$kon_akhir,'$namaFile')";
        if (mysqli_query($conn,$query)) {
    header("location:rent.php");
    //    	echo "Sukses";
} else {
    echo "gagal menambah data";
  }

?>
