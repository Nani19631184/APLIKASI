<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      JADWAL BIMBINGAN PERKAWINAN
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
        <div class="alert alert-info text-center">
        <h4><b>INFORMASI</b></h4>
        <h4 class="text-black">Pelaksanaan BINWIN dilakukan setiap hari SELASA.<br>Silahkan cek jadwal anda.</h4>

          </div>
          <div class="box-header">
            <div class="btn-group pull-right">            
            <a href="event1.php" style="margin:5px;" class="btn btn-info btn-sm" ><i class="fa fa-eye"> &nbsp Lihat Agenda</i></a>
            </div><hr>
            
            <?php 
                if(isset($_GET['alert'])){
                  if($_GET['alert']=='gagal'){
                    ?>
                    <div class="alert alert-warning alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <h4><i class="icon fa fa-warning"></i> Peringatan !</h4>
                      Ekstensi Tidak Diperbolehkan
                    </div>                
                    <?php
                  }elseif($_GET['alert']=="berhasil"){
                    ?>
                    <div class="alert alert-success alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <h4><i class="icon fa fa-check"></i> Success</h4>
                      Berhasil Disimpan
                    </div>                
                    <?php
                  }elseif($_GET['alert']=="berhasilupdate"){
                    ?>
                    <div class="alert alert-success alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <h4><i class="icon fa fa-check"></i> Success</h4>
                      Berhasil Update
                    </div>                
                    <?php
                  }
                }
                ?>
          </div>     
         
          
                 
          <div class="box-body">
          
            <!-- Modal -->


            <div class="table-responsive">
            
              <table class="table table-bordered table-striped" id="table-datatable">
                
                <thead>
                  <tr>
                  <th width="1%" >NO</th>
                    <th  class="text-center">TANGGAL BIMWIN</th>
                    <th  class="text-center">NAMA CATIN</th>
                    <th  class="text-center">NO.HP</th>
                    <th  class="text-center">PENYULUH</th>
                    <th  class="text-center">FILE UNDANGAN</th>
                  </tr>
                </thead>
                 <tbody>

                 <?php 
                  include '../koneksi.php';
                  $no=1;

                  $sql = "SELECT * FROM binwin,penyuluh where penyuluh.penyuluh_id=binwin.penyuluh and username='".$_SESSION['username']."'";
                  $data = mysqli_query($koneksi,$sql);
                  while ($d = mysqli_fetch_array($data)) {
                    ?>
                    <tr>
                  
                      <td class="text-center"><?php echo $no++; ?></td>
                      <td class="text-center"><?php echo $d['jadwal_tgl']; ?></td> 
                      <td class="text-center"><?php echo $d['nama']; ?></td>
                      <td class="text-center"><?php echo $d['no_hp']; ?></td>
                      <td class="text-center"><?php echo $d['penyuluh']; ?></td>   
                      <td class="text-center"><?php echo $d['binwin_foto']; ?><a href="download.php?filename=<?php echo $d['binwin_foto']?>">download</a></td>

                      <div class="modal fade" id="lihat_binwin_<?php echo $d['binwin_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title" id="exampleModalLabel">Lihat Berkas</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <embed src="../gambar/bukti/<?php echo $d['binwin_foto']; ?>" type="application/pdf" width="100%" height="400px" />
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                </div>
                              </div>
                            </div>
                          </div>

                  </tr>
                  <?php 
                }
                ?>

                
              </tbody>
              
            </table>
           
          </div>
        </div>

      </div>
    </section>
  </div>
</section>

</div>
<?php include 'footer.php'; ?>

