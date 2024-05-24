<?php 
include("../proses.php");
// Cek Status Login
if (!isset($_SESSION["login"] )) {
  header("Location: ../pages/login.php");
  exit;
}
// End Of Cek Status Login
$id = $_SESSION["login"];
$db = new Connect_db();
$result = $db->db_From_Id("SELECT * FROM user WHERE id = '$id'");

// Upload Pesanan
if (isset($_POST["pesan"])) {
  $id_tiket = $_POST["id_tiket"];
  $order_id = $_POST["order_id"];
  $email = $_POST["email"];
  $catatan = $_POST["catatan"];
  $rek_pengirim = $_POST["rek_pengirim"];
  $namarek_pengirim = $_POST["namarek_pengirim"];
  $bank_pengirim = $_POST["bank_pengirim"];
  $jenis_pesanan = $_POST["jenis_pesanan"];
  $bank_penerima = $_POST["bank_penerima"];
  $total_pembayaran = $_POST["total_pembayaran"];
  $waktu_pesanan = $_POST["waktu_pesanan"];
  $status = $_POST["status"];
  $link_status = $_POST["link_status"];
  $warna_status = $_POST["warna_status"];
  $bukti_transfer = $db->upload_Gambar($_FILES["gambar"]);
  
  $db->set_Pesanan($id_tiket, $order_id, $email, $catatan, $rek_pengirim, $namarek_pengirim, $bank_pengirim, $jenis_pesanan, $bank_penerima, $total_pembayaran, $waktu_pesanan,$bukti_transfer, $status, $link_status, $warna_status);
}
// End Of Upload Pesanan

// id tiket acak
$id_tiket_acak = mt_rand(00000,99999);
// end of id tiket acak
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/order.css">
  <title>Order</title>
</head>
<body>
  <div class="form-style-10">
    <h1>Buat Pesanan<span>Mohon isi informasi anda dengan lengkap</span></h1>
    <form action="" method="post" enctype="multipart/form-data">

      <!-- BAGIAN 1 -->
        <div class="section"><span>1</span>Informasi Pemesan</div>
        <div class="inner-wrap">
            <?php foreach ($result as $data_form): ?>
            <!-- GENERATE ORDER ID MENGGUNAKAN USERNAME + ID ACAK -->
            <input type="hidden" name="id_tiket" value="<?php echo $data_form["username"]?>|<?php echo $id_tiket_acak?>" readonly/></label>  
            
            <!-- GENERATE USERNAME MENGGUNAKAN USERNAME TERDAFTAR DI DATABASE -->
            <label>Username <input type="text" name="order_id" value="<?php echo $data_form["username"]?>" readonly/></label>
            
            <!-- GENERATE WA / EMAIL SESUAI YANG TERDAFTAR DI DATABASE -->
            <label>Whatsapp / Email <input type="text" name="email" value="<?php echo $data_form["no_wa"]?> / <?php echo $data_form["email"]?>" readonly /></label>
            <?php endforeach ?>
            
            <!-- CATATAN -->
            <label>Catatan <textarea name="catatan" autocomplete="off"></textarea></label>
        </div>
      <!-- END OF BAGIAN 1 -->

      <!-- BAGIAN 2 -->
        <div class="section"><span>2</span>Informasi Pengirim</div>
        
        <div class="inner-wrap">
            <!-- NO REKENING PENGIRIM -->
            <label>No Rekening <input required type="text" name="rek_pengirim" autocomplete="off" /></label>
            
            <!-- NAMA REKENING PENGIRIM -->
            <label>Nama Rekening <input type="text" required name="namarek_pengirim" autocomplete="off" /></label>
            
            <!-- JENIS BANK PENGIRIM -->
            <label>Bank Pengirim <select name="bank_pengirim">
              <option value="" >Pilih Bank Yang Anda Gunakan</option>
              <option value="BCA">BCA</option>
              <option value="BSI">BSI</option>
              <option value="BANK 9">BANK 9</option>
              <option value="MANDIRI">MANDIRI</option>
              <option value="BNI">BNI</option>
              <option value="BRI">BRI</option>
              <option value="DANA">DANA</option>
              <option value="OVO">OVO</option>
              <option value="...">Lainnya...</option>
            </select></label>
            
        </div>
      <!-- END OF BAGIAN 2 -->

      <!-- BAGIAN 3 -->
        <div class="section"><span>3</span>Informasi Pembayaran</div>
        
        <div class="inner-wrap">

            <!-- JENIS PESANAN -->
            <label>Jenis Barang <select name="jenis_pesanan" id="list-pesanan" onchange="getSelectValue();">
              <option value="wisata berkuda" >wisata berkuda</option>
              <option value="private lesson">Private Lesson</option>
              <option value="group lesson">group lesson</option>
              <option value="riding school">riding school</option>
              <option value="archery time">archery time</option>
              <option value="archery school">archery scool</option>
              <option value="edukasi panahan">edukasi panahan</option>
              <option value="prewedding">prewedding</option>
            
            </select></label>
            <!-- END OF JENIS PESANAN -->

            <!-- NILAI SESUAI PESANAN YANG DIPILIH -->
            <script>
              function getSelectValue(){
                var selectedValue = document.getElementById("list-pesanan").Value;
                var total = 0;
                if (selectedValue == "wisata berkuda") {
                  total = 25.000;
                }
                var hasil = document.getElementById("total-biaya");
                // BUAT ELEMENT BARU KEDALAM ID total-biaya
                hasil.innerHTML = "<label>Total Pembayaran <input readonly type='text' name='total_pembayaran' value='" + total + "'/></label>"
              }
            </script>
            <!-- END OF NILAI SESUAI PESANAN YANG DIPILIH -->
            
            <!-- NILAI SESUAI PESANAN YANG DIPILIH -->
            <script>
              function getSelectValue(){
                var selectedValue = document.getElementById("list-pesanan").value;
                var total = 0;
                if (selectedValue == "private lesson") {
                  total = 100.000;
                }
                var hasil = document.getElementById("total-biaya");
                // BUAT ELEMENT BARU KEDALAM ID total-biaya
                hasil.innerHTML = "<label>Total Pembayaran <input readonly type='text' name='total_pembayaran' value='" + total + "'/></label>"
              }
            </script>
            <!-- END OF NILAI SESUAI PESANAN YANG DIPILIH -->

             <!-- NILAI SESUAI PESANAN YANG DIPILIH -->
             <script>
              function getSelectValue(){
                var selectedValue = document.getElementById("list-pesanan").value;
                var total = 0;
                if (selectedValue == "group lesson") {
                  total = 100.000;
                }
                var hasil = document.getElementById("total-biaya");
                // BUAT ELEMENT BARU KEDALAM ID total-biaya
                hasil.innerHTML = "<label>Total Pembayaran <input readonly type='text' name='total_pembayaran' value='" + total + "'/></label>"
              }
            </script>
            <!-- END OF NILAI SESUAI PESANAN YANG DIPILIH -->

             <!-- NILAI SESUAI PESANAN YANG DIPILIH -->
             <script>
              function getSelectValue(){
                var selectedValue = document.getElementById("list-pesanan").value;
                var total = 0;
                if (selectedValue == "riding school") {
                  total = 1.000000;
                }
                var hasil = document.getElementById("total-biaya");
                // BUAT ELEMENT BARU KEDALAM ID total-biaya
                hasil.innerHTML = "<label>Total Pembayaran <input readonly type='text' name='total_pembayaran' value='" + total + "'/></label>"
              }
            </script>
            <!-- END OF NILAI SESUAI PESANAN YANG DIPILIH -->

            <!-- NILAI SESUAI PESANAN YANG DIPILIH -->
            <script>
              function getSelectValue(){
                var selectedValue = document.getElementById("list-pesanan").value;
                var total = 0;
                if (selectedValue == "archery time") {
                  total = 50.000;
                }
                var hasil = document.getElementById("total-biaya");
                // BUAT ELEMENT BARU KEDALAM ID total-biaya
                hasil.innerHTML = "<label>Total Pembayaran <input readonly type='text' name='total_pembayaran' value='" + total + "'/></label>"
              }
            </script>
            <!-- END OF NILAI SESUAI PESANAN YANG DIPILIH -->
            
             <!-- NILAI SESUAI PESANAN YANG DIPILIH -->
             <script>
              function getSelectValue(){
                var selectedValue = document.getElementById("list-pesanan").value;
                var total = 0;
                if (selectedValue == "archery school") {
                  total = 200.000;
                }
                var hasil = document.getElementById("total-biaya");
                // BUAT ELEMENT BARU KEDALAM ID total-biaya
                hasil.innerHTML = "<label>Total Pembayaran <input readonly type='text' name='total_pembayaran' value='" + total + "'/></label>"
              }
            </script>
            <!-- END OF NILAI SESUAI PESANAN YANG DIPILIH -->

             <!-- NILAI SESUAI PESANAN YANG DIPILIH -->
             <script>
              function getSelectValue(){
                var selectedValue = document.getElementById("list-pesanan").value;
                var total = 0;
                if (selectedValue == "edukasi panahan") {
                  total = 25.000;
                }
                var hasil = document.getElementById("total-biaya");
                // BUAT ELEMENT BARU KEDALAM ID total-biaya
                hasil.innerHTML = "<label>Total Pembayaran <input readonly type='text' name='total_pembayaran' value='" + total + "'/></label>"
              }
            </script>
            <!-- END OF NILAI SESUAI PESANAN YANG DIPILIH -->

            <!-- NILAI SESUAI PESANAN YANG DIPILIH -->
            <script>
              function getSelectValue(){
                var selectedValue = document.getElementById("list-pesanan").value;
                var total = 0;
                if (selectedValue == "prewedding") {
                  total = 500.000;
                }
                var hasil = document.getElementById("total-biaya");
                // BUAT ELEMENT BARU KEDALAM ID total-biaya
                hasil.innerHTML = "<label>Total Pembayaran <input readonly type='text' name='total_pembayaran' value='" + total + "'/></label>"
              }
            </script>
            <!-- END OF NILAI SESUAI PESANAN YANG DIPILIH -->

            <!-- JENIS BANK TUJUAN -->
            <label>Jenis Bank <select id="list-bank" onchange="getSelectBank();">
              <option value="" >Pilih Bank Tujuan</option>
              <option value="BSI">BSI</option>
              <option value="BANK 9">BANK 9</option>
              <option value="BRI">BRI</option>
              <option value="...">Lainnya...</option>
            </select></label>
            <!-- END OF JENIS BANK TUJUAN -->

            <!-- NILAI SESUAI JENIS BANK TUJUAN -->
            <script>
              function getSelectBank(){
                var selectedValue = document.getElementById("list-bank").value;
                var hasil = document.getElementById("rek-tujuan");
                var no_rekening = "null";
                if (selectedValue == "BSI") {
                  no_rekening = "BSI 2845505950 A/N SHELLY MARCELINA";
                }else if(selectedValue == "BANK 9"){
                  no_rekening = "BANK 9 7001643538 A/N SHELLY MARCELINA";
                }else if(selectedValue == "BRI"){
                  no_rekening = "BRI 5633 0102 2665 535 A/N SHELLY MARCELINA";
                }else{
                  no_rekening = "BELUM TERSEDIA";
                }
                // BUAT ELEMENT BARU KEDALAM ID rek-tujuan
                hasil.innerHTML = "<label>No Rek Tujuan <input readonly type='text' name='bank_penerima' value='" + no_rekening + "'/></label>"
              }
            </script>
            <!-- END OF NILAI SESUAI JENIS BANK TUJUAN -->

            <!-- NEW KOLOM NO REK TUJUAN -->
            <div id="rek-tujuan"></div>
            <!-- NEW KOLOM TOTAL BIAYA PEMBAYARAN -->
            <div id="total-biaya"></div>

            <!-- AUTO GENERATE STATUS PESANAN, WAKTU PESANAN, LINK STATUS, WARNA STATUS -->
            <input type="hidden" name='status' value='pending'>
            <input type="hidden" name="waktu_pesanan" value="<?php echo date('l, d-m-Y | H:i:s a');?>" /></label>
            <input type="hidden" name="link_status" value="#">
            <input type="hidden" name="warna_status" value="warning">

            <!-- UPLOAD BUKTI TRANSFER -->
            <label>Bukti Transfer <input type="file" name="gambar"></label>  
          </div>
            <!-- END OF BAGIAN 3 -->  

            <!-- TOMBOL KIRIM -->
          <div class="button-section">
            <input type="submit" name="pesan" value="Kirim" />
          </div>
    </form>
    </div> 
</body>
</html>