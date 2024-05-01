<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      BIMBINGAN KELUARGA SAKINAH
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
          </div>
          <div class="box-header">
            <div class="btn-group pull-right">            
            <a href="event1.php" style="margin:5px;" class="btn btn-info btn-sm" ><i class="fa fa-eye"> &nbsp Lihat Agenda</i></a>
              <button type="button" style="margin:5px;" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-plus"></i> &nbsp Daftar Bimbingan
              </button>
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
            <form action=" bimbingan_act.php"  method="post" enctype="multipart/form-data">
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" id="exampleModalLabel">Daftar</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                    
                    <div class="form-group">
                                  <label>Tanggal</label>
                                  <input type="text" name="jadwal_tanggal" required="required" class="form-control datepicker2">
                                  <input type="hidden" name="username" value="<?php echo $_SESSION['username'] ?>">     
                                            </div>                      

                                <div class="form-group">
                        <label>Alamat Bimbingan</label>
                        <input type="text" name="alamat" autocomplete="off" class="form-control">
                      </div>

                    <div class="form-group">
                    <label>Tanggal Bimbingan</label>
                    <input type="datetime-local" name="jadwal_tgl" required="required" class="form-control">
                    </div>


                    <div class="form-group">
                    <label>NO HP</label>
                    <input type="text" name="no_hp" autocomplete="off" class="form-control">
                    </div>

                    <div class="form-group">
                    <label>PENYULUH</label>
                    <select name="penyuluh" class="form-control" required="required">
                      <option value="">- Pilih -</option>
                      <?php 
                      $penyuluh = mysqli_query($koneksi,"SELECT * FROM penyuluh ORDER BY penyuluh ASC");
                      while($k = mysqli_fetch_array($penyuluh)){
                        ?>
                        <option value="<?php echo $k['penyuluh_id']; ?>"><?php echo $k['penyuluh']; ?></option>
                        <?php 
                      }
                      ?>
                    </select>                   
                    </div>



                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                      <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                  </div>
                </div>
              </div>
              
            </form>


            <div class="table-responsive">
            
              <table class="table table-bordered table-striped" id="table-datatable">
                
                <thead>
                  <tr>
                  <th width="1%" >NO</th>
                  <th  class="text-center">TANGGAL PENDAFTARAN</th>
                    <th  class="text-center">ALAMAT BIMBINGAN</th>
                    <th  class="text-center">TANGGAL BIMBINGAN</th>
                    <th  class="text-center">NO.HP</th>
                    <th  class="text-center">PENYULUH</th>
                    <th  class="text-center">STATUS</th>
                  </tr>
                </thead>
                 <tbody>
                  <?php 
                  include '../koneksi.php';
                  $sql = "SELECT * FROM bimbingan,penyuluh where penyuluh.penyuluh_id=bimbingan.penyuluh and username='".$_SESSION['username']."'";
                  $data = mysqli_query($koneksi,$sql);
                  $no=1;
                  while($d = mysqli_fetch_array($data)){
                   ?>
                    <tr>
                      <td class="text-center"><?php echo $no++; ?></td>
                      <td><?php echo $d['jadwal_tanggal']; ?></td>
                      <td><?php echo $d['alamat']; ?></td>                   
                      <td><?php echo $d['jadwal_tgl']; ?></td> 
                      <td><?php echo $d['no_hp']; ?></td>
                      <td><?php echo $d['penyuluh']; ?></td>                      
                      <td><?php

if ($d['status'] == 0) {

echo "<span class='label label-warning badge-pill'>Belum Dikonfirmasi</span>";
}
else{
echo "<span class='label label-pill label-success'>Pengajuan Disetujui</span>";

}?></td> 



                        <div class="modal fade" id="lihat_bimbingan_<?php echo $d['bimbingan_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title" id="exampleModalLabel">Lihat Berkas</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <embed src="../gambar/bukti/<?php echo $d['bimbingan_foto']; ?>" type="application/pdf" width="100%" height="400px" />
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                </div>
                              </div>
                            </div>
                          </div>
    
                            
                      <!-- modal hapus -->
                      <div class="modal fade" id="hapus_bimbingan_<?php echo $d['bimbingan_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title" id="exampleModalLabel">Peringatan!</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">

                              <p>Yakin ingin menghapus data ini ?</p>

                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                              <a href="bimbingan_hapus.php?id=<?php echo $d['bimbingan_id'] ?>" class="btn btn-primary">Hapus</a>
                            </div>
                          </div>
                        </div>
                      </div>

                    </td>
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

