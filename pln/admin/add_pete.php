<?php
include 'include/koneksi.php';
if(isset($_POST['add_pt'])) {
        $nama = $_POST['nama'];
        $checkName = "SELECT * FROM pt WHERE nama = '$nama'";
		$run = mysqli_query($conn, $checkName);
		$data = mysqli_fetch_array($run);
        $result = "INSERT INTO pt(id,nama) VALUES('','$nama')";
        if ($data[0] > 0) {
				?>
			<script>alert('Name already added. Input a different name')
			window.location = "add_pt.php";
			</script>
			   <?php
			   exit();
			} else {
			mysqli_query($conn,$result);
			header("location:add_pt.php");
			}
		}
			?>
