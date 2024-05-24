<?php
include("../proses.php");

// Cek Status Login
if (!isset($_SESSION["login"])) {
  header("Location: ../pages/login.php");
  exit;
}
// End Of Cek Status Login

$id = $_SESSION["login"];
$db = new Connect_db();
$result = $db->db_From_Id("SELECT * FROM user WHERE id = '$id'");
$data_username = "";
$no_table = 0;
foreach ($result as $query_order) {
  $data_username = $query_order["username"];
}
$result_table = $db->db_From_Id("SELECT * FROM user_order WHERE order_id = '$data_username'");

?>
<!DOCTYPE html>

<html lang="en">
  <head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>Order</title>
    <link rel="apple-touch-icon" sizes="57x57" href="assets/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="assets/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="assets/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="assets/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="assets/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="assets/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="assets/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="assets/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="assets/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="assets/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <!-- Vendors styles-->
    <link rel="stylesheet" href="vendors/simplebar/css/simplebar.css">
    <link rel="stylesheet" href="css/vendors/simplebar.css">
    <!-- Main styles for this application-->
    <link href="css/style.css" rel="stylesheet">
    <!-- We use those styles to show code examples, you should remove them in your application.-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/prismjs@1.23.0/themes/prism.css">
    <link href="css/examples.css" rel="stylesheet">
    <!-- Global site tag (gtag.js) - Google Analytics-->
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-3"></script>
    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag() {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());
      // Shared ID
      gtag('config', 'UA-118965717-3');
      // Bootstrap ID
      gtag('config', 'UA-118965717-5');
    </script>
    <link href="vendors/@coreui/chartjs/css/coreui-chartjs.css" rel="stylesheet">
  </head>
  <body>
    <?php
    include("sidebar.html");
    ?>
    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
    <header class="header header-sticky mb-4">
    <div class="container-fluid">
      <button class="header-toggler px-md-0 me-md-3" type="button" onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
        <svg class="icon icon-lg">
          <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-menu"></use>
        </svg>
      </button>
      
      
      <ul class="header-nav ms-3">
      <?php foreach ($result as $username): ?>  
       <p><strong><?php echo $username["username"] ?></strong></p>
      <?php endforeach ?> 
        
      </ul>
    </div>
   
    </header>
      <div class="body flex-grow-1 px-3">
        <div class="container-lg">
          
          <!-- /.row-->
          <div class="row">
            <div class="col-md-12">
              <div class="card mb-4">
                <div class="card-header">Pembelian</div>
                <div class="card-body">
                  
                  <!-- /.row-->
                  <div class="table-responsive">
                    <table class="table border mb-0">
                      <thead class="table-light fw-semibold">
                        <tr class="align-middle">
                          <th class="text-center">
                            No
                          </th>
                          <th>Jenis Barang</th>
                          <th class="text-center">Tanggal Pembelian</th>
                          
                          <th class="text-center">Metode Pembayaran</th>
                          <th>Status</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>

                      <?php foreach ($result_table as $table): ?>
                        <?php $no_table++?>
                        <tr class="align-middle">
                          <td class="text-center">
                            <div class="avatar avatar-md"><span><?php echo $no_table?></span></div>
                          </td>
                          <td>
                            <div><?php echo $table["jenis_pesanan"]?></div>
                          
                          </td>
                          <td class="text-center">
                            
                            <div class="small text-medium-emphasis"><b><?php echo $table["waktu_pesanan"]?></b></div>
                            
                          </td>
                          
                          <td class="text-center">
                            <div class="small text-medium-emphasis"><b><span><?php echo $table["bank_penerima"]?></span></b></div>
                          </td>
                          <td>
                          <!-- Button trigger modal -->
                            <a class="btn btn-<?php echo $table["warna_status"]?> btn-sm" target="_blank" href="<?php echo $table["link_status"]?>?id_tiket=<?php echo $table["id_tiket"]?>">
                              <?php echo $table["status"]?>
                            </a>
                          </td>                         
                          
                        </tr>
                      <?php endforeach?>   
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.col-->
          </div>
          <!-- /.row-->
        </div>
      </div>
      
    </div>
    <!-- CoreUI and necessary plugins-->
    <script src="vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>
    <script src="vendors/simplebar/js/simplebar.min.js"></script>
    <!-- Plugins and scripts required by this view-->
    <script src="vendors/chart.js/js/chart.min.js"></script>
    <script src="vendors/@coreui/chartjs/js/coreui-chartjs.js"></script>
    <script src="vendors/@coreui/utils/js/coreui-utils.js"></script>
    <script src="js/main.js"></script>
    <script>
    </script>

  </body>
</html>