<?php
error_reporting(0);
include("../proses.php");
$db = new Connect_db();
// CEK LOGIN ADMIN
if (!isset($_SESSION["login_admin"])) {
    header("Location: loginadmin.php");
    exit;
}

$id_nama = $_SESSION["login_admin"];
// QUERY DATABASE YANG DIPERLUKAN

// QUERY DATABASE SESUAI DENGAN ID YANG DIGUNAKAN LOGIN OLEH ADMIN
$result_data = $db->db_From_Id("SELECT * FROM admin WHERE id = '$id_nama'");

// QUERY DATABASE SESUAI DENGAN STATUS PESANAN NYA = PENDING
$pesanan_tertunda = $db->db_From_Id("SELECT * FROM user_order WHERE status = 'pending'");

// QUERY DATABASE SESUAI DENGAN STATUS PESANAN NYA TELAH DIGUNAKAN
$pesanan_selesai = $db->db_From_Id("SELECT * FROM user_order WHERE status = 'Telah Digunakan'");

// END OF QUERY DATABASE YANG DIPERLUKAN

// PROSES UNTUK MENGHITUNG DATA TAMPILAN DASHBOARD
$jumlah_pesanan_tertunda = 0;
$jumlah_pesanan_selesai = 0;
$total_uang_pesanan_tertunda = 0;
$total_uang_pesanan_selesai = 0;
foreach ($pesanan_tertunda as $p) {
    $total_uang_pesanan_tertunda += $p["total_pembayaran"];
    $jumlah_pesanan_tertunda++;
}
foreach ($pesanan_selesai as $pp) {
    $total_uang_pesanan_selesai += $pp["total_pembayaran"];
    $jumlah_pesanan_selesai++;
}
// END OF PROSES UNTUK MENGHITUNG DATA TAMPILAN DASHBOARD

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Side bar-->
        <?php
        include("sidebar.html");
        ?>
        <!-- End of side bar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- DASHBOARD -->
            <div id="content">

                <!-- Top bar -->
                <?php
                include("topbar.html")
                ?>
                <!-- End of top bar -->
                
                <div class="container-fluid">

                <!-- TAMPILAN DASHBOARD -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- COLUMN 1 -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Penghasilan (Selesai)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">RP.<?php echo $total_uang_pesanan_selesai?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- COLUMN 2 -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Penghasilan (Tertunda)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">RP.<?php echo $total_uang_pesanan_tertunda?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- COLUMN 3 -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            
                                            <div class="row no-gutters align-items-center">
                                                
                                            <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                Pesanan Selesai</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jumlah_pesanan_selesai?></div>
                                        </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- COLUMN 4 -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Pesanan Tertunda</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jumlah_pesanan_tertunda ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                

            </div>
            <!-- END OF DASHBOARD -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Rizdevelopment</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>