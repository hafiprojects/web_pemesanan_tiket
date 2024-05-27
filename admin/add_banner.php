<?php
include("../proses.php");
include("upload_photo.php");
$db = new Connect_db();
if (!isset($_SESSION["login_admin"])) {
    header("Location: loginadmin.php");
    exit;
}
$id_nama = $_SESSION["login_admin"];
$result_data = $db->db_From_Id("SELECT * FROM admin WHERE id = '$id_nama'");

$photoPath = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["simpan"])) {
    if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] !== UPLOAD_ERR_NO_FILE) {
        $photo = $_FILES["photo"];
        $photoPath = uploadPhoto($photo);
    }else{
        $photoPath = 'NoFileIncluded';
    }

    if (in_array($photoPath, ['ExtensionNotValid', 'ErrorUploadingFile', 'NoFileIncluded', 'MaxFileSizeExceeded'])) {
        if ($photoPath == 'ExtensionNotValid') {
            echo '<script>';
            echo 'alert("Ekstensi file tidak valid")';
            echo '</script>';
        }

        if ($photoPath == 'ErrorUploadingFile') {
            echo '<script>';
            echo 'alert("Gagal upload gambar")';
            echo '</script>';
        }

        if ($photoPath == 'NoFileIncluded') {
            echo '<script>';
            echo 'alert("File tidak ada")';
            echo '</script>';
        }

        if ($photoPath == 'MaxFileSizeExceeded') {
            echo '<script>';
            echo 'alert("Ukuran file terlalu besar, tidak boleh lebih dari 5MB")';
            echo '</script>';
        }
    } else {
        $db->simpan_Banner($photoPath);
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin- Manajemen Banner</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

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
                    <h1 class="h3 mb-2 text-gray-800">Tambah Banner</h1>
                    <p class="mb-4">halaman tambah banner</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tambah Banner</h6>
                        </div>
                        <div class="card-body">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Input Banner <span class="text-danger">*</span></label>
                                        <div class="col-lg-9">
                                            <input type="file" name="photo" id="photo" class="d-block" onchange="loadFile(event)">
                                            <p style="font-size: 10pt">Gambar maksimal berukuran 5MB</p>
                                        </div>
                                        <div class="col-lg-12">
                                            <hr>
                                            <label>Preview Gambar :</label>
                                            <div class="row ps-2 pe-2">
                                                <img src="" id="outputImage" class="photo" style="max-width: 500px;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-end">
                                        <span class="text-muted float-start">
                                            <strong class="text-danger">*</strong> Harus diisi
                                        </span>
                                        <br>
                                        <a class="btn btn-secondary" href="index_banner.php">Kembali</a>
                                        <button class="btn btn-primary" name="simpan">Simpan</button>
                                    </div>
                                </div>
                            </form>
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

    <!-- Custom -->
    <script>
        const loadFile = (event) => {
            const reader = new FileReader()
            reader.onload = () => {
                let output = document.querySelector("#outputImage")
                output.src = reader.result
            }
            reader.readAsDataURL(event.target.files[0])
        }
    </script>

</body>

</html>