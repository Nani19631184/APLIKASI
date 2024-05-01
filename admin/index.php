<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Dashboard
  
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
     </ol>
  </section>


  <section class="content">

    <div class="row">

      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-blue-gradient">
          <div class="inner">
            <?php 
            $nikah = mysqli_query($koneksi,"SELECT * FROM nikah WHERE status LIKE '%0%'");
            $jml_nikah = mysqli_num_rows($nikah);
            ?>
            <h4 style="font-weight: bolder"><?php echo number_format($jml_nikah, 0,",","."); ?></h4>
            <p>Daftar Nikah</p>
            
           <h4><span class="label label-warning badge-pill">Belum Dikonfirmasi</span></h4>
          </div>
          <div class="icon">
            <i class="ion ion-person"></i>
          </div>
          <a href="nikah.php" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

 

      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-green-gradient">
          <div class="inner">
            <?php 
            $jadwal = mysqli_query($koneksi,"SELECT * FROM jadwal");
            $jml_jadwal = mysqli_num_rows($jadwal);
            ?>
            <h4 style="font-weight: bolder"><?php echo number_format($jml_jadwal, 0,",","."); ?></h4>
            <p>JADWAL NIKAH</p>
            </br>
            </div>
          <div class="icon">
            <i class="ion ion-calendar"></i>
          </div>
          <a href="event.php" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

     <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-black">
          <div class="inner">
          <p>Seluruh Pemasukan</p>

            <?php 
            $pemasukan = mysqli_query($koneksi,"SELECT sum(transaksi_nominal) as total_pemasukan FROM transaksi ");
            $p = mysqli_fetch_assoc($pemasukan);
            ?>
            <h4 style="font-weight: bolder"><?php echo "Rp. ".number_format($p['total_pemasukan'])." ,-" ?></h4>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
       
        </div>
      </div>


      <div class="container">
            <canvas id="myChart" width="100" height="100"></canvas>
        </div>
        <script>
            var ctx = document.getElementById("myChart");
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
                    datasets: [{
                            label: '# of Votes',
                            data: [12, 19, 3, 5, 2, 3],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255,99,132,1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 1
                        }]
                },
                options: {
                    scales: {
                        yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                    }
                }
            });
        </script>









  </section>

</div>







<?php include 'footer.php'; ?>