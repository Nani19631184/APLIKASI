<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
<head profile="http://gmpg.org/xfn/11">
<title>KUA KEC. BANJARMASIN TIMUR</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="imagetoolbar" content="no" />
<link rel="stylesheet" href="styles/layout.css" type="text/css" />
</head>
<body id="top">
<div class="wrapper row3">
  <div class="rnd">
    <div id="container" class="clear">
      <!-- ####################################################################################################### -->
          <div class="box-body">
          <div class="row">
      <section class="col-lg-12">
        <div class="box box-info">
        <div class="alert alert-info text-center">
        <center>
        <h4><b>INFORMASI</b></h4>
  <h4 class="text-black">Pelaksanaan Bimbingan Perkawinan dilakukan setiap hari SELASA.<br>Silahkan cek jadwal anda.</h4>
          </center>
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
$data       = mysqli_query($koneksi,'select * from binwin');
//melakukan looping
while($d = mysqli_fetch_array($data)){     
?>
{
title: '<?php echo $d['nama']; ?>', //menampilkan title dari tabel
start: '<?php echo $d['jadwal_tgl']; ?>', //menampilkan tgl mulai dari tabel
end: '<?php echo $d['jadwal_tanggal']; ?>' //menampilkan tgl selesai dari tabel

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

      <!-- ####################################################################################################### -->
    </div>
  </div>
</div>
</body>
</html>