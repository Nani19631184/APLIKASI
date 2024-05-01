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
                    <label>Penyuluh</label>
                    <select name="penyuluh" class="form-control" required="required">
                      <option value="semua">- Semua Kategori -</option>
                      <?php 
                      $penyuluh = mysqli_query($koneksi,"SELECT * FROM penyuluh");
                      while($k= mysqli_fetch_array($penyuluh)){
                        ?>
                        <option <?php if(isset($_GET['penyuluh'])){ if($_GET['penyuluh'] == $k['penyuluh_id']){echo "selected='selected'";}} ?>  value="<?php echo $k['penyuluh_id']; ?>"><?php echo $k['penyuluh']; ?></option>
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
            <h3 class="box-title">LAPORAN BIMBINGAN MANASIK HAJI </h3>
          </div>
        <div class="box-body">

            <?php 
            if(isset($_GET['tanggal_sampai']) && isset($_GET['tanggal_dari']) && isset($_GET['penyuluh'])){
              $tgl_dari = $_GET['tanggal_dari'];
              $tgl_sampai = $_GET['tanggal_sampai'];
              $penyuluh = $_GET['penyuluh'];
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
                      <th>Penyuluh</th>
                      <th>:</th>
                      <td>
                        <?php 
                        if($penyuluh == "semua"){
                          echo "SEMUA penyuluh";
                        }else{
                          $k= mysqli_query($koneksi,"SELECT * FROM penyuluh where penyuluh_id='$penyuluh'");
                          $kk = mysqli_fetch_array($k);
                          echo $kk['penyuluh'];
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
                    <th  class="text-center">USERNAME</th>
                    <th  class="text-center">ALAMAT</th>
                    <th  class="text-center">TANGGAL BIMBINGAN</th>
                    <th  class="text-center">PENYULUH</th>
                  </tr>
                  </thead>
                <tbody>
                    <?php 
                    include '../koneksi.php';
                    $no=1;                
                      if($penyuluh == "semua"){
                        $data = mysqli_query($koneksi,"SELECT * FROM jhaji,penyuluh where penyuluh.penyuluh_id=jhaji.penyuluh and date(jadwal_tanggal)>='$tgl_dari' and date(jadwal_tanggal)<='$tgl_sampai'");
                      }else{
                        $data = mysqli_query($koneksi,"SELECT * FROM jhaji,penyuluh where penyuluh.penyuluh_id=jhaji.penyuluh and penyuluh_id='$penyuluh' and date(jadwal_tanggal)>='$tgl_dari' and date(jadwal_tanggal)<='$tgl_sampai'");
                      }
                      while($d = mysqli_fetch_array($data)) { 
                      
                        ?>
                     
                      <tr>
                      <td class="text-center"><?php echo $no++; ?></td>
                      <td><?php echo $d['jadwal_tanggal']; ?></td> 
                      <td><?php echo $d['username']; ?></td>
                      <td><?php echo $d['alamat']; ?></td>
                      <td><?php echo $d['jadwal_tgl']; ?></td> 
                      <td><?php echo $d['penyuluh']; ?></td>                      
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

