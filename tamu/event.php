<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
     JADWAL NIKAH    
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <section class="col-lg-12">
        <div class="box box-info">
          <div class="box-header">
            <div class="btn-group pull-right">            
            </div>
          </div>
          <div class="box-body">
          <div class="row">
      <section class="col-lg-12">
        <div class="box box-info">
        <div class="alert alert-info text-center">
        <h4><b>INFORMASI</b></h4>
  <h4 class="text-black">Pelaksanaan Akad hanya bisa dilakukan sebanyak 10 pasangan selama sehari.<br>Silahkan cek tanggal dan jam yang anda inginkan sebelum melakukan pendaftaran.</h4>
          </div>
          
<div class="col-lg-12">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    headerToolbar: {
      left: "prev,next today",
      center: "title",
      right: "dayGridMonth,timeGridWeek,timeGridDay"
    },
                    
                    events: [ <?php 

//melakukan koneksi ke database
$koneksi    = mysqli_connect('localhost', 'root', '', 'pelayanan');
//mengambil data dari tabel jadwal
$data       = mysqli_query($koneksi,'select * from jadwal');
//melakukan looping
while($d = mysqli_fetch_array($data)){     
?>
{
title: '<?php echo $d['nama']; ?>', //menampilkan title dari tabel
start: '<?php echo $d['jadwal_tgl']; ?>', //menampilkan tgl mulai dari tabel
end: '<?php echo $d['jadwal_tgl']; ?>' //menampilkan tgl selesai dari tabel

},
<?php } ?>],
                    selectOverlap: function (event) {
                        return event.rendering === 'background';
                    }
                });
    
                calendar.render();
            });
        </script>

        

          <?php
        
        ?>

      </div>
    </div>
  </section>
    
    <?php include 'footer.php'; ?>