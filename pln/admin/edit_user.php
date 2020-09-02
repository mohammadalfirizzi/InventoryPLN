<?php
include 'include/koneksi.php';
 session_start();
  if($_SESSION['status']!="login"){
    header("location:index.php?pesan=belum_login");
  }
  ?>
  <?php
                        if(isset($_POST['Edit']))
                        {   
                            $id = $_POST['id'];

                            $username=$_POST['username'];
                            $email=$_POST['email'];
                            $password=$_POST['password'];
                            $active=$_POST['active'];
                            $role=$_POST['role'];
                            $result = mysqli_query($conn, "UPDATE users SET username='$username',email='$email',password='$password', active='$active', role='$role' WHERE id=$id");
                            header("Location: user.php");
                        }
                        ?>
                        <?php
                        $id = $_GET['id'];
                        $result = mysqli_query($conn, "SELECT * FROM users WHERE id=$id");

                        while($data = mysqli_fetch_array($result))
                        {
                            $username = $data['username'];
                            $email = $data['email'];
                            $password = $data['password'];
                            $active = $data['active'];
                            $role = $data['role'];
                        }
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>Matrix Template - The Ultimate Multipurpose admin template</title>
    <!-- Custom CSS -->
    <link href="../assets/libs/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet" />
    <link href="../assets/extra-libs/calendar/calendar.css" rel="stylesheet" />
    <link href="../dist/css/style.min.css" rel="stylesheet">
</head>

<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <?php include 'include/header.php';  ?>
        <?php include 'include/left_nav.php';  ?>
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Add User</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">User</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Student</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container m-4"> 
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                 <div class="row">
                    <div class="container">
                    <form action="edit_user.php" method="post">
            <div class="card">
                <div class="card-header">
                    Form Input User
                </div>
                <div class="card-body">
                      <?php
                        $id = $_GET['id'];
                        $result = mysqli_query($conn, "SELECT * FROM users WHERE id=$id");

                        while($data = mysqli_fetch_array($result))
                        {
                            $username = $data['username'];
                            $email = $data['email'];
                            $password = $data['password'];
                            $role = $data['role'];
                        }
?>
                        <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" class="form-control" id="username" placeholder="Masukkan Nama Pengguna" value="<?php echo $username;?>" >
                            </div>
                            <div class="form-group">
                                <label for="username">E-mail</label>
                                <input type="email" name="email" class="form-control" id="username" placeholder="Masukkan E-mail Pengguna" value="<?php echo $email;?>">
                            </div>
                            <div class="form-group">
                                <label for="username">Status</label>
                           <select class="form-control" name="active">
                                  <?php
                                  $query = $conn->query('SELECT * FROM users');
                                    while($result = mysqli_fetch_array($query)) {
                                  ?>
                                    <option value="<?php echo $result['active'] ?>" <?php echo $data['id'] ? 'selected'  : ' ' ?>> <?php echo $result['active']; ?> </option>
                                  <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="username">Role</label>
                           <select class="form-control" name="role">
                                  <?php
                                  $query = $conn->query('SELECT * FROM users');
                                    while($result = mysqli_fetch_array($query)) {
                                  ?>
                                    <option value="<?php echo $result['role'] ?>" <?php echo $result['role'] == $data['role'] ? 'selected'  : ' ' ?>> <?php echo $result['role']; ?> </option>
                                  <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="password">Kata Sandi</label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Masukkan Kata Sandi" value="<?php echo $password;?>">
                            </div>
                        </div>
                    
                </div>
                <div class="card-footer">
                    <input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
                    <button type="submit" class="btn btn-primary" name="Edit">Simpan</button>
                </div>
            </div>
            </form>
                 </div>
             </div>
         </div>
            
           
                 <!-- BEGIN MODAL -->
                <div class="modal none-border" id="my-event">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title"><strong>Add Event</strong></h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body"></div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-success save-event waves-effect waves-light">Create event</button>
                                <button type="button" class="btn btn-danger delete-event waves-effect waves-light" data-dismiss="modal">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal Add Category -->
                <div class="modal fade none-border" id="add-new-event">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title"><strong>Add</strong> a category</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="control-label">Category Name</label>
                                            <input class="form-control form-white" placeholder="Enter name" type="text" name="category-name" />
                                        </div>
                                        <div class="col-md-6">
                                            <label class="control-label">Choose Category Color</label>
                                            <select class="form-control form-white" data-placeholder="Choose a color..." name="category-color">
                                                <option value="success">Success</option>
                                                <option value="danger">Danger</option>
                                                <option value="info">Info</option>
                                                <option value="primary">Primary</option>
                                                <option value="warning">Warning</option>
                                                <option value="inverse">Inverse</option>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger waves-effect waves-light save-category" data-dismiss="modal">Save</button>
                                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer text-center">
                All Rights Reserved by Matrix-admin. Designed and Developed by <a href="https://wrappixel.com">WrapPixel</a>.
            </footer>
           </div>
        </div>
        <script src="js/Chart.min.js"></script>
    <script>
var ctx = document.getElementById('myChart');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Rusak', 'Baik', 'Dipinjam', 'Total'],
        datasets: [{
            label: 'Details',
            data: [12, 19, 3, 5],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../dist/js/jquery.ui.touch-punch-improved.js"></script>
    <script src="../dist/js/jquery-ui.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="../assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="../dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="../dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../dist/js/custom.min.js"></script>
    <!-- this page js -->
    <script src="../assets/libs/moment/min/moment.min.js"></script>
    <script src="../assets/libs/fullcalendar/dist/fullcalendar.min.js"></script>
    <script src="../dist/js/pages/calendar/cal-init.js"></script>

</body>

</html>