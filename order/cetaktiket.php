<!-- AKAN DILAKUKAN JIKA ADMIN SUDAH KONFIRMASI PESANAN -->
<?php
$id_tiket = $_GET["id_tiket"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/cetaktiket.css">
    <title>Cetak Tiket Berkuda</title>
</head>
<body>
  <link href="https://fonts.googleapis.com/css?family=Cabin|Indie+Flower|Inknut+Antiqua|Lora|Ravi+Prakash" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"  />
  
  <div class="container">
    <h1 class="upcomming">Cetak Tiket  Bekuda Anda Segera</h1>
    <div class="item">
      <div class="item-right">
        <h2 class="num">11</h2>
        <p class="day">Mei</p>
        <span class="up-border"></span>
        <span class="down-border"></span>
      </div> <!-- end item-right -->
      
      <div class="item-left">
        <p class="event">id tiket : <?php echo $id_tiket?></p>
        
        <h2 class="title">Tiket Berkuda Kota Jambi</h2>
        
        <div class="sce">
          <div class="icon">
            <i class="fa fa-table"></i>
          </div>
          <p>Senin, 11 Mei 2024 <br/> 15:00Pm & 17:30Am</p>
        </div>
        <div class="fix"></div>
        <div class="loc">
          <div class="icon">
            <i class="fa fa-map-marker"></i>
          </div>
          <p>Jl.Marsda Surya Dharma KM.10
Kel. Kenali Asam Kec. Kotabaru. <br/> Kota Jambi, Jambi</p>
        </div>
        <div class="fix"></div>
        <p>Harap Tiket Disimpan Dan Ditunjukkan Ke Petugas Saat Memasuki Arena Berkuda</p>
        
      </div> <!-- end item-right -->
    </div> <!-- end item -->
    
    <script>window.print();</script>
  </div>        
</body>
</html>