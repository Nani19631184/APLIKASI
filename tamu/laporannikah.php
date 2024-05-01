<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      LAPORAN
      
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
            <h3 class="box-title">Filter Laporan</h3>
          </div>
          <div class="box-body">
            <form method="get" action="">
              <div class="row">
                <div class="col-md-3">

                  <div class="form-group">
                    <label>Mulai Tanggal</label>
                    <input autocomplete="off" type="text" value="<?php if(isset($_GET['tanggal_dari'])){echo $_GET['tanggal_dari'];}else{echo "";} ?>" name="tanggal_dari" class="form-control datepicker2" placeholder="Mulai Tanggal" required="required">
                  </div>

                </div>

                <div class="col-md-3">

                  <div class="form-group">
                    <label>Sampai Tanggal</label>
                    <input autocomplete="off" type="text" value="<?php if(isset($_GET['tanggal_sampai'])){echo $_GET['tanggal_sampai'];}else{echo "";} ?>" name="tanggal_sampai" class="form-control datepicker2" placeholder="Sampai Tanggal" required="required">
                  </div>
                </div>



                <div class="col-md-2"style="margin: 10px">

                  <div class="form-group">
                    <br/>
                    <input type="submit" value="TAMPILKAN" class="btn btn-sm btn-primary btn-block">
                  </div>

                </div>
              </div>
            </form>
          </div>
        </div>

        <div class="box box-info">
          <div class="box-header">
            <h3 class="box-title">Laporan Data Nikah </h3>
          </div>
          <div class="box-body">

            <?php 
            if(isset($_GET['tanggal_sampai']) && isset($_GET['tanggal_dari'])){
              $tgl_dari = $_GET['tanggal_dari'];
              $tgl_sampai = $_GET['tanggal_sampai'];
              ?>

              <div class="row">
                <div class="col-lg-6">
                  <table class="table table-bordered">
                    <tr>
                      <th width="30%">DARI TANGGAL</th>
                      <th width="1%">:</th>
                      <td><?php echo $tgl_dari; ?></td>
                    </tr>
                    <tr>
                      <th>SAMPAI TANGGAL</th>
                      <th>:</th>
                      <td><?php echo $tgl_sampai; ?></td>
                    </tr>

                  </table>
                </div>
              </div>
                         
              <a href="laporannikah_print.php?tanggal_dari=<?php echo $tgl_dari ?>&tanggal_sampai=<?php echo $tgl_sampai ?>" target="_blank" class="btn btn-sm btn-primary"><i class="fa fa-print"></i>  &nbsp PRINT</a>
              <div class="table-responsive">
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                    <th width="1%" >NO</th>
                    <th width="10%"  class="text-center">TANGGAL</th>
                    <th class="text-center">NAMA CATIN PRIA</th>
                    <th class="text-center">UMUR</th>
                    <th class="text-center">NIK</th>
                    <th  class="text-center">STATUS</th>
                    <th  class="text-center">NO.HP</th>
                    <th  class="text-center">NAMA CATIN WANITA</th>
                    <th  class="text-center">UMUR</th>
                    <th  class="text-center">NIK</th>
                    <th  class="text-center">STATUS</th>
                    <th  class="text-center">NO.HP</th>
                    <th class="text-center">Saksi 1</th>
                    <th class="text-center">Saksi 2</th>
                  </tr>

                  </thead>
                  <tbody>
                    <?php 
                    include '../koneksi.php';
                    $no=1;                 
                    $data = mysqli_query($koneksi,"SELECT * FROM nikah,penghulu where penghulu.penghulu_id=nikah.penghulu and username='".$_SESSION['username']."' and date(jadwal_tanggal)>='$tgl_dari' and date(jadwal_tanggal)<='$tgl_sampai'");
                    while($d = mysqli_fetch_array($data)) { 
                    ?>
                      <tr>
                      <td class="text-center"><?php echo $no++; ?></td>
                      <td><?php echo $d['jadwal_tanggal']; ?></td>
                      <td><?php echo $d['suami']; ?></td>
                      <td><?php echo $d['umur']; ?></td>
                      <td><?php echo $d['nik']; ?></td>                  
                      <td><?php echo $d['status_s']; ?></td>                                            
                      <td><?php echo $d['no_hp']; ?></td>
                      <td><?php echo $d['istri']; ?></td>
                      <td><?php echo $d['umuri']; ?></td>
                      <td><?php echo $d['nik_istri']; ?></td>                  
                      <td><?php echo $d['status_i']; ?></td>                                            
                      <td><?php echo $d['no_telp']; ?></td>
                      <td><?php echo $d['saksi1']; ?></td>
                      <td><?php echo $d['saksi2']; ?></td>
                      </tr> 
                

                    <?php
                  }
                  ?>                    


                  </tbody>
                </table>

              </div>

              <?php 
            }
              ?>

              <div class="alert alert-info text-center">
                Silahkan Filter Laporan Terlebih Dulu.
              </div>

              <?php
            
            ?>

          </div>
        </div>
      </section>
    </div>
  </section>

</div>
<?php include 'footer.php'; ?>

