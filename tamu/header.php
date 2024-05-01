<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Pengguna - KUA</title>
  
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../assets/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="../assets/dist/css/AdminLTE.min.css">

  <link rel="stylesheet" href="../assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

  <link rel="stylesheet" href="../assets/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="../assets/bower_components/morris.js/morris.css">
  <link rel="stylesheet" href="../assets/bower_components/jvectormap/jquery-jvectormap.css">
  <link rel="stylesheet" href="../assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="../assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">

  <link rel="stylesheet" href="../assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
 
       <!-- fullcalendar css  -->
       <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/main.css' rel='stylesheet' />
     

  <?php 
  include '../koneksi.php';
  session_start();
  if($_SESSION['status'] != "user_logedin"){
    header("location:../index.php?alert=belum_login");
  }
  ?>

</head>
<body class="hold-transition skin-blue sidebar-mini">


 
  <style>
   
    #table-datatable {
      width: 100% !important;
    }
    #table-datatable .sorting_disabled{
      border: 1px solid #f4f4f4;
    
    }

  </style>

    <div class="wrapper">


    <header class="main-header">
      <a href="index.php" class="logo">
        <span class="logo-mini"><b><i class="fa fa-user"></i></b> </span>
        <span class="logo-lg">Pelayanan KUA </span>
      </a>
      <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>
<ul class="nav navbar-nav">
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">PELAYANAN NIKAH<span class="caret"></span></a>
<ul class="dropdown-menu" aria-labelledby="about-us">
<li><a href="nikah.php">DAFTAR NIKAH</a></li>     
              <li><a href="jadwal.php"></i> JADWAL NIKAH</a></li>               
              <li><a href="binwin.php"></i> JADWAL BIMWIN</a></li>     
              <li><a href="rekomendasi.php"></i> SURAT REKOMENDASI NIKAH</a></li>  
</ul>
</li>
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">MANASIK HAJI<span class="caret"></span></a>
<ul class="dropdown-menu" aria-labelledby="a">
<li><a href="haji.php"></i>DAFTAR BIMBINGAN</a></li>     
<li><a href="jhaji.php"></i>LIHAT JADWAL</a></li>    
</ul>
</li>

<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">ZAKAT<span class="caret"></span></a>
<ul class="dropdown-menu" aria-labelledby="a">
<li><a href="transaksi.php"></i>BAYAR ZAKAT</a></li>     
<li><a href="penerima.php"></i>PENYALURAN ZAKAT</a></li>    
</ul>
</li>

<li><a href="bimbingan.php"></i> KELUARGA SAKINAH</a></li>
<li><a href="legalisir.php"></i> LEGALISIR</a></li>                   
<li><a href="masjid.php"></i>DATA MASJID</a></li>  



            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <?php 
                $id_user = $_SESSION['id'];
                $profil = mysqli_query($koneksi,"select * from user where user_id='$id_user'");
                $profil = mysqli_fetch_assoc($profil);
                if($profil['user_foto'] == ""){ 
                  ?>
                  <img src="../gambar/sistem/user.png" class="user-image">
                <?php }else{ ?>
                  <img src="../gambar/user/<?php echo $profil['user_foto'] ?>" class="user-image">
                <?php } ?>
                <span class="hidden-xs"><?php echo $_SESSION['nama']; ?> - <?php echo $_SESSION['level']; ?></span>
              </a>
            </li>


    </header>

    <aside class="main-sidebar">
      <section class="sidebar">
        <div class="user-panel">
          <div class="pull-left image">
            <?php 
            $id_user = $_SESSION['id'];
            $profil = mysqli_query($koneksi,"select * from user where user_id='$id_user'");
            $profil = mysqli_fetch_assoc($profil);
            if($profil['user_foto'] == ""){ 
              ?>
              <img src="../gambar/sistem/user.png" class="img-circle">
            <?php }else{ ?>
              <img src="../gambar/user/<?php echo $profil['user_foto'] ?>" class="img-circle" style="max-height:45px">
            <?php } ?>
          </div>
          <div class="pull-left info">
            <p><?php echo $_SESSION['nama']; ?></p>
          </div>
        </div>

        <ul class="sidebar-menu" data-widget="tree">
          <li class="header"></li>

          <li>
            <a href="index.php">
              <i class="fa fa-dashboard"></i> <span>BERANDA</span>
            </a>
          </li>


          <li>
            <a href="penghulu.php">
              <i class="fa fa-user"></i> PENGHULU</a></li>  
            </a>
          </li>

          <li>
            <a href="penyuluh.php">
              <i class="fa fa-user"></i> PENYULUH</a></li>  
            </a>
          </li>



          <li class="treeview">
            <a href="#">
              <i class="fa fa-file"></i>
              <span>LAPORAN</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu" style="display: none;">
            <li><a href="laporannikah.php"><i class="fa fa-circle-o"></i>Laporan Registrasi Nikah</a></li>     
            <li><a href="laporanjadwal.php"><i class="fa fa-circle-o"></i>Laporan Jadwal Nikah</a></li>               
            <li><a href="laporanhaji.php"><i class="fa fa-circle-o"></i>Laporan B.Manasik Haji</a></li>     
            <li><a href="laporanbimbingan.php"><i class="fa fa-circle-o"></i>Laporan B.Keluarga Sakinah</a></li>     
            <li><a href="laporanlegalisir.php"><i class="fa fa-circle-o"></i>Laporan Legalisir </a></li>               
            <li><a href="laporanrekomendasi.php"><i class="fa fa-circle-o"></i>Laporan Rekomendasi</a></li>     
            <li><a href="laporantransaksi.php"><i class="fa fa-circle-o"></i>Laporan Data zakat</a></li>               

            </ul>
          </li>


          <li>
            <a href="gantipassword.php">
              <i class="fa fa-lock"></i> <span>GANTI PASSWORD</span>
            </a>
          </li>

          

          <li>
              <a href="logout.php"><i class="fa fa-sign-out"></i> LOGOUT</a>
            </li>

    </ul>
      </section>
      <!-- /.sidebar -->
    </aside>

