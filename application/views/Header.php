<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>JAJANPULSA.ID</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?php echo base_url()?>assets/img/logo_icon.png" rel="icon">
  <link href="<?php echo base_url()?>assets/img/logo_icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo base_url()?>assets/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url()?>assets/assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="<?php echo base_url()?>assets/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?php echo base_url()?>assets/assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="<?php echo base_url()?>assets/assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="<?php echo base_url()?>assets/assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?php echo base_url()?>assets/assets/css/style.css" rel="stylesheet">
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css"> -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/css_tabbar/style.css">
  <!-- Vendor JS Files -->
  <script src="<?php echo base_url()?>assets/assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url()?>assets/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url()?>assets/assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="<?php echo base_url()?>assets/assets/vendor/php-email-form/validate.js"></script>
  <script src="<?php echo base_url()?>assets/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?php echo base_url()?>assets/assets/vendor/venobox/venobox.min.js"></script>
  <script src="<?php echo base_url()?>assets/assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="<?php echo base_url()?>assets/assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="<?php echo base_url()?>assets/assets/js/main.js"></script>
  
  <style>
/*body {font-family: Arial;}*/

/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #fff;
  border-top-left-radius: 10px;
  border-top-right-radius: 10px;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #FF6363;
  color: #fff;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #FF6363;
  color: #fff;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
  border-bottom-left-radius: 10px;
  border-bottom-right-radius: 10px;
}

/*li:hover {
  background-color: #FF6363;
  color: #fff;
}*/
</style>
  <!-- =======================================================
  * Template Name: Ninestars - v2.3.1
  * Template URL: https://bootstrapmade.com/ninestars-free-bootstrap-3-theme-for-creative/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container-fluid d-flex">

      <div class="logo mr-auto">
        <!-- <h1 class="text-light"> -->
          <!-- <a href="<?php echo base_url('Dashboard')?>"><span style="color:#FF6363;font-weight: bold;">JAJANPULSA.ID</span></a></h1> -->
        <!-- Uncomment below if you prefer to use an image logo -->
         <a href="<?php echo base_url('dashboard')?>">
          <img style="height: 120%;width: 120%;" src="<?php echo base_url()?>assets/img/logo_x.png" alt="" class="">
        </a>
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="<?php if($this->uri->segment(2) == ''){echo 'active';}else{ echo '';}?>"><a href="<?php echo base_url('dashboard')?>">Beranda</a></li>
          <li class="<?php if($this->uri->segment(2) == 'checkbill'){echo 'active';}else{ echo '';}?>"><a href="<?php echo base_url('dashboard/checkbill')?>">Cek Pembelian</a></li>
          <li class="<?php if($this->uri->segment(2) == 'services'){echo 'active';}else{ echo '';}?>"><a href="<?php echo base_url('dashboard/services')?>">Layanan</a></li>
          <li class="<?php if($this->uri->segment(2) == 'artikel'){echo 'active';}else{ echo '';}?>"><a href="<?php echo base_url('dashboard/artikel')?>">Keuntungan</a></li>
          <!-- <li><a href="#portfolio">Mitra</a></li>
          <li><a href="#gallery">Galeri Mitra</a></li> -->
          <li><a href="<?php echo base_url('login')?>">Masuk</a></li>
          <li class="get-started"><a href="#about">Download Aplikasi</a></li>
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->