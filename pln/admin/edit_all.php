<?php
session_start();
include 'include/koneksi.php';
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
                        <h4 class="page-title">Add Borrower</h4>
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
                      <?php
                          $id = $_GET['id'];
                          $query = $conn->query("SELECT * FROM rent");
                          $qu = mysqli_fetch_array($query);
                            ?>
                    <form action="proses_editall.php" method="post" enctype="multipart/form-data">
            <div class="card">
                <div class="card-header">
                    Form Input Borrower
                </div>
                <div class="card-body">
                        <div class="col-12 col-md-12">
                          <div class ="form-group">
                              <label for="ID">ID</label>
                              <input type="text" disable value="<?php echo $qu['id'] ?>" name="id" class="form-control" placeholder="" disabled>
                              <input type="hidden" value="<?= $qu['id']; ?>" name="id">
                          </div>
                            <div class="form-group">
                                <label for="nama">Judul Kontrak</label>
                                <br>
                                <input type="text" value="<?php echo $qu['judul'] ?>" name="judul" class="form-control">
                            </div>
                             <div class="form-group">
                                <label for="peminjam">Perseroan Terbatas</label>
                                <select class="form-control" name="nama_pt">
                                   <?php
                                   $query = $conn->query('SELECT * FROM rent');
                                     while($result = mysqli_fetch_array($query)) {
                                   ?>
                                     <option value="<?php echo $result['nama_pt'] ?>" <?php echo $result['nama_pt'] == $qu['nama_pt'] ? 'selected'  : ' ' ?>> <?php echo $result['nama_pt']; ?> </option>
                                   <?php } ?>
                                 </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Kontrak Awal</label>
                                <input type="date" value="<?php echo date('Y-m-d', strtotime($qu['kon_awal'])) ?>"  name="kon_awal"
                           class="form-control datepicker" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Kontrak Akhir</label>
                                <input type="date" value="<?php echo date('Y-m-d', strtotime($qu['kon_akhir'])) ?>"  name="kon_akhir"
                           class="form-control datepicker" required>
                            </div>
                            <div class ="form-group">
                                <label for="Status">Status Peminjaman</label>
                                <select name="status" class="form-control">
                                  <option value="1" <?php echo $qu['status'] == 1 ? 'selected' : ' ' ?>>Sudah Dikembalikan</option>
                                  <option value="0" <?php echo $qu['status'] == 0 ? 'selected' : ' ' ?>>Belum Dikembalikan</option>
                                </select>
                                </div>
                            <div class="form-group">
                              <input type="file" style="color:transparent;" onchange="this.style.color = 'black';" value="<?php echo $qu['file'] ?>" name="file" required/>
                            </div>

                        </div>

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
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
