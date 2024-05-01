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

                <div class="col-md-3">

                  <div class="form-group">
                    <label>Penghulu</label>
                    <select name="penghulu" class="form-control" required="required">
                      <option value="semua">- Semua Kategori -</option>
                      <?php 
                      $penghulu = mysqli_query($koneksi,"SELECT * FROM penghulu");
                      while($k= mysqli_fetch_array($penghulu)){
                        ?>
                        <option <?php if(isset($_GET['penghulu'])){ if($_GET['penghulu'] == $k['penghulu_id']){echo "selected='selected'";}} ?>  value="<?php echo $k['penghulu_id']; ?>"><?php echo $k['penghulu']; ?></option>
                        <?php 
                      }
                      ?>
                    </select>
                  </div>
                </div>
                 
                <div class="col-md-2" style="margin: 10px">

                  <div class="form-group">
                      </br>
                    <input type="submit" value="TAMPILKAN" class="btn btn-sm btn-primary btn-block">
                  </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>

        <div class="box box-info">
          <div class="box-header">
            <h3 class="box-title">Laporan Riwayat Penghulu </h3>
          </div>
        <div class="box-body">

            <?php 
            if(isset($_GET['tanggal_sampai']) && isset($_GET['tanggal_dari']) && isset($_GET['penghulu'])){
              $tgl_dari = $_GET['tanggal_dari'];
              $tgl_sampai = $_GET['tanggal_sampai'];
              $penghulu = $_GET['penghulu'];
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
                    
                    <tr>
                      <th>PENGHULU</th>
                      <th>:</th>
                      <td>
                        <?php 
                        if($penghulu == "semua"){
                          echo "SEMUA PENGHULU";
                        }else{
                          $k= mysqli_query($koneksi,"SELECT * FROM penghulu where penghulu_id='$penghulu'");
                          $kk = mysqli_fetch_array($k);
                          echo $kk['penghulu'];
                        }
                        ?>
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
                         
              <div class="table-responsive">
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                    <th width="1%" >NO</th>
                    <th width="10%"  class="text-center">TANGGAL</th>
                    <th  class="text-center">NAMA CATIN</th>
                    <th  class="text-center">WALI<br>NIKAH</th>
                    <th  class="text-center">TANGGAL<br>NIKAH</th>
                    <th  class="text-center">TEMPAT<br>NIKAH</th>
                    <th  class="text-center">NO.HP</th>
                    <th  class="text-center">PENGHULU</th>
                  </tr>
                  </thead>
                <tbody>
                    <?php 
                    include '../koneksi.php';
                    $no=1;                
                      if($penghulu == "semua"){
                        $data = mysqli_query($koneksi,"SELECT * FROM jadwal,penghulu where penghulu.penghulu_id=jadwal.penghulu and date(jadwal_tanggal)>='$tgl_dari' and date(jadwal_tanggal)<='$tgl_sampai'");
                      }else{
                        $data = mysqli_query($koneksi,"SELECT * FROM jadwal,penghulu where penghulu.penghulu_id=jadwal.penghulu and penghulu_id='$penghulu' and date(jadwal_tanggal)>='$tgl_dari' and date(jadwal_tanggal)<='$tgl_sampai'");
                      }
                      while($d = mysqli_fetch_array($data)) { 
                      
                        ?>
                     
                      <tr>
                      <td class="text-center"><?php echo $no++; ?></td>
                      <td><?php echo $d['jadwal_tanggal']; ?></td>
                      <td><?php echo $d['nama']; ?></td>
                      <td><?php echo $d['wali']; ?></td>
                      <td><?php echo $d['jadwal_tgl']; ?></td>                  
                      <td><?php echo $d['tempat']; ?></td>                                            
                      <td><?php echo $d['no_hp']; ?></td>
                      <td><?php echo $d['penghulu']; ?></td>                      
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

