<?php
include 'koneksi.php';
if(isset($_GET['pesan'])){
		if($_GET['pesan'] == "gagal"){
			echo "Login gagal! username dan password salah!";
		}else if($_GET['pesan'] == "logout"){
			echo "Anda telah berhasil logout";
		}else if($_GET['pesan'] == "belum_login"){
			echo "Anda harus login untuk mengakses halaman admin";
		}
		else if($_GET['pesan'] == "belum_aktif"){
			echo "Akun anda belum aktif";
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>PLN Surabaya</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/flash.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<style>
.container-login100{
	background-color: ffff4d;
}
	</style>
<!--===============================================================================================-->
</head>
<body>

	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/img-03.jpg');">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/img-01.png" alt="IMG">
				</div>

					<form class="login100-form validate-form" action="proses_login.php" method="post">
					<span class="login100-form-title">
						PLN Member Login
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>

					<div class="text-center p-t-12">
					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="regist.php">
							Create your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
					</form>
				<div class="row">
  <div class="col-lg-12 grid-margin stretch-card mt-5">
    <div class="card">
        <div class="card-header">
            <h4>All Borrower</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                 <table class="table table-bordered">
          <thead>
            <tr>
              <th> No </th>
              <th> Judul Kontrak </th>
              <th> Perseroan Terbatas </th>
              <th> Kontrak Awal </th>
              <th> Kontrak Akhir </th>
              <th> Status </th>
            </tr>
          </thead>
          <tbody>
             <?php
               $sql = "SELECT * FROM rent";
               $result = $conn->query($sql);
               $id=1;
        if (mysqli_num_rows($result) > 0) :
          while ($data = mysqli_fetch_array($result)) { ?>
            <tr>
              <td><?=$id++;?></td>
              <td><?php echo $data['judul']; ?></td>
              <td><?=$data['nama_pt']?></td>
              <td><?php echo date('d-m-Y',strtotime($data['kon_awal'])); ?></td>
              <td><?php echo date('d-m-Y',strtotime($data['kon_akhir'])); ?></td>
              <td><span class="btn btn-xs btn-<?php echo $data['status'] == 1 ? 'success' : 'danger' ?>"><?php echo $data['status'] == 1 ? 'sudah selesai' : 'belum selesai'; ?></span></td>
              
            </tr>
          <?php
          };
        else : ?>
          <tr>
            <td colspan="7">Data Kosong</td>
          </tr>
        <?php
        endif;
        ?>

            </tr>
          </tbody>
        </table>
            </div>
        </div>
    </div>
  </div>
</div>

			</div>
		</div>
	</div>




<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
