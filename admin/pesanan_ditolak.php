<?php
include("../proses.php");
$db = new Connect_db();
if (!isset($_SESSION["login_admin"])) {
    header("Location: loginadmin.php");
    exit;
}
$id_nama = $_SESSION["login_admin"];
$result_data = $db->db_From_Id("SELECT * FROM admin WHERE id = '$id_nama'");
$result_table = $db->db_From_Id("SELECT * FROM user_order WHERE status = 'Ditolak'");
$no = 0;
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

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
        include("sidebar.html");
        ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php
                include("topbar.html");
                ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Pesanan Ditolak</h1>
                    <p class="mb-4">Pesanan ditolak oleh admin, karena mungkin tidak memenuhi persyaratan, anda bisa mengubah status pesanan menjadi diterima dengan mengklik tombol terima</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Pesanan Ditolak</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ID Tiket</th>
                                            <th>Jenis Pesanan</th>
                                            <th>Username</th>
                                            <th>WA / Email</th>
                                            <th>Catatan</th>
                                            <th>Rek Pengirim</th>
                                            <th>Bank Penerima</th>
                                            <th>Total Pembayaran</th>
                                            <th>Waktu Pesanan</th>
                                            <th>Konfirmasi</th>
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>ID Tiket</th>
                                            <th>Jenis Pesanan</th>
                                            <th>Username</th>
                                            <th>WA / Email</th>
                                            <th>Catatan</th>
                                            <th>Rek Pengirim</th>
                                            
                                            <th>Bank Penerima</th>
                                            <th>Total Pembayaran</th>
                                            <th>Waktu Pesanan</th>
                                            <th>Konfirmasi</th>
                                            
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php foreach ($result_table as $data): ?>
                                        <?php $no++?>
                                        <tr>
                                            <td><?php echo $no ?></td>
                                            <td><?php echo $data["id_tiket"]?></td>
                                            <td><?php echo $data["jenis_pesanan"]?></td>
                                            <td><?php echo $data["order_id"]?></td>
                                            <td><?php echo $data["email"]?></td>
                                            <td><?php echo $data["catatan"]?></td>
                                            <td><?php echo $data["bank_pengirim"]?> <?php echo $data["rek_pengirim"]?> <?php echo $data["namarek_pengirim"]?></td>
                                            <td><?php echo $data["bank_penerima"]?></td>
                                            <td><?php echo $data["total_pembayaran"]?></td>
                                            <td><?php echo $data["waktu_pesanan"]?></td>
                                            <td><a class="btn btn-success" 
                                            href="ifconfirm.php?id=<?php echo $data['id']?>">Terima</a></td>
                                            
                                            
                                        </tr>
                                    <?php endforeach; ?>    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

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

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>