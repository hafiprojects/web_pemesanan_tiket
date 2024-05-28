<?php
include("../proses.php");

$db = new Connect_db();

$artikel_data = $db->get_Artikel();
$banner_data = $db->get_Banner();
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <!-- mobile metas -->
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="viewport" content="initial-scale=1, maximum-scale=1">
   <!-- site metas -->
   <title>Category</title>
   <meta name="keywords" content="">
   <meta name="description" content="">
   <meta name="author" content="">
   <!-- owl carousel style -->
   <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.0.0-beta.2.4/assets/owl.carousel.min.css" />
   <!-- bootstrap css -->
   <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
   <!-- style css -->
   <link rel="stylesheet" type="text/css" href="../css/style.css">
   <!-- Responsive-->
   <link rel="stylesheet" href="../css/responsive.css">
   <!-- fevicon -->
   <link rel="icon" href="../images/fevicon.png" type="image/gif" />
   <!-- Scrollbar Custom CSS -->
   <link rel="stylesheet" href="../css/jquery.mCustomScrollbar.min.css">
   <!-- Tweaks for older IEs-->
   <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
   <!-- owl stylesheets -->
   <link rel="stylesheet" href="../css/owl.carousel.min.css">
   <link rel="stylesheet" href="../css/owl.theme.default.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
</head>

<body>

   <!--banner section start -->
   <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
         <a class="navbar-brand" href="#">
            <h1 style="padding-top: 10px;">Home</h1>
         </a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>

         <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
               <li class="nav-item">
                  <a class="btn btn-light btn-login-text" href="pages/login.php" target="_blank">Login</a>
               </li>
            </ul>
         </div>
      </nav>
   </div>

   <div class="container">
      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
         <div class="carousel-inner">
            <?php foreach ($banner_data as $key => $data) : ?>
               <?php $activeClass = $key === 0 ? 'active' : ''; ?>
               <div class="carousel-item <?php echo $activeClass; ?>">
                  <img class="d-block w-100" src="../<?php echo $data['image']; ?>" alt="Slide image">
               </div>
            <?php endforeach; ?>
         </div>
         <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
         </a>
         <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
         </a>
      </div>
   </div>
   <!--banner section end -->
   <!--category section start -->

   <div class="container">
      <div class="category_section_2">
         <h1 class="touch_taital mb-5" style="font-family: Arial, Helvetica, sans-serif ;">Kegiatan Al-Hidayah Horse Stable</h1>

         <div class="row">
            <?php foreach ($artikel_data as $key => $data) : ?>
               <div class="col-lg-4 col-sm-12">
                  <div class="beds_section">
                     <h1 class="bed_text" style="font-family: Arial, Helvetica, sans-serif ;"><?php echo $data['title'] ?></h1>
                     <div><img src="../<?php echo $data['thumbnail'] ?>" class="image_2"></div>
                     <div class="seemore_bt"><a href="category.php?article=<?php echo $data['slug']; ?>" style="font-family: Arial, Helvetica, sans-serif ;">Lihat Artikel</a></div>
                  </div>
               </div>
            <?php endforeach; ?>
            <br>
         </div>
      </div>
   </div>
   <!-- category section end -->
   <!-- footer section start -->
   <div class="footer_section layout_padding">
      <div class="container">
         <div class="row">
            <div class="col-lg-6 col-sm-12">
               <h4 class="information_text" style="font-family: Arial, Helvetica, sans-serif ;">Informasi</h4>
               <p class="dummy_text" style="text-align: justify; font-family: Arial, Helvetica, sans-serif ;"> Alamat lokasi: PKP AL-HIDAYAH Jl. Marsda Surya Dharma, Kenali Asam Bawah, Kota Baru, Kota Jambi, Jambi 36129, Indonesia.</p>
            </div>
            <div class="col-lg-3 col-sm-6">
               <div class="information_main">
                  <h4 class="information_text" style="font-family: Arial, Helvetica, sans-serif ;">Akses Link</h4>
                  <p class="call_text" style="font-family: Arial, Helvetica, sans-serif ;"><a href="pages/index.php">Kegiatan</a></p>
                  <p class="call_text" style="font-family: Arial, Helvetica, sans-serif ;"><a href="pages/login.php">Dapatkan Tiket</a></p>

                  <p class="call_text" style="font-family: Arial, Helvetica, sans-serif ;"><a href="#"></a></p>
               </div>
            </div>
            <div class="col-lg-3 col-sm-6">
               <div class="information_main">
                  <h4 class="information_text" style="font-family: Arial, Helvetica, sans-serif ;">Contact Us</h4>
                  <p class="call_text" style="font-family: Arial, Helvetica, sans-serif ;"><a>0822-8956-0436(Ridwan)</a></p>
                  <p class="call_text" style="font-family: Arial, Helvetica, sans-serif ;"><a>0822-1069-7955(Nurdiansyah)</a></p>
                  <p class="call_text" style="font-family: Arial, Helvetica, sans-serif ;"><a>0853-6637-4938(Safitriani)</a></p>
                  <p class="call_text" style="font-family: Arial, Helvetica, sans-serif ;"><a>0857-5820-7151(Siti Nurlela)</a></p>
                  <p class="call_text" style="font-family: Arial, Helvetica, sans-serif ;"><a>0821-8031-2348(Ratu Kholiah)</a></p>
                  <p class="call_text" style="font-family: Arial, Helvetica, sans-serif ;"><a>0822-6981-5635(Lela Armila)</a></p>

               </div>
            </div>
         </div>
         <div class="copyright_section">
            <h1 class="copyright_text" style="font-family: Arial, Helvetica, sans-serif ;">
               Copyright 2024 All Right Reserved <a href="#"> Al-hidayah Horse Stable Jambi</a>
         </div>
      </div>
   </div>
   <!-- footer section end -->
   <!-- Javascript files-->
   <script src="../js/jquery.min.js"></script>
   <script src="../js/popper.min.js"></script>
   <script src="../js/bootstrap.bundle.min.js"></script>
   <script src="../js/jquery-3.0.0.min.js"></script>
   <script src="../js/plugin.js"></script>
   <!-- sidebar -->
   <script src="../js/jquery.mCustomScrollbar.concat.min.js"></script>
   <script src="../js/custom.js"></script>
   <!-- javascript -->
   <script src="../js/owl.carousel.js"></script>
   <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
   <script type="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2//2.0.0-beta.2.4/owl.carousel.min.js"></script>
   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
   <script>
      window.jQuery || document.write('<script src="../../../assets/js/vendor/jquery-slim.min.js"><\/script>')
   </script>
   <script src="../../../assets/js/vendor/popper.min.js"></script>
   <script src="../../../dist/js/bootstrap.min.js"></script>
</body>

</html>