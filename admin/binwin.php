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
          </div>
          <div class="box-header">
            <div class="btn-group pull-right">            
            <a href="event1.php" style="margin:5px;" class="btn btn-info btn-sm" ><i class="fa fa-eye"> &nbsp Lihat Agenda</i></a>
              <button type="button" style="margin:5px;" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-plus"></i> &nbsp Tambah Data
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
            <form action=" binwin_act.php"  method="post" enctype="multipart/form-data">
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" id="exampleModalLabel">Tambah Jadwal</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                    
                    <div class="form-group">
                    <label>Mulai</label>
                    <input type="datetime-local" name="jadwal_tgl" required="required" class="form-control">
                    </div>

                    <div class="form-group">
                    <label>Selesai</label>
                    <input type="datetime-local" name="jadwal_tanggal" required="required" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>NAMA CATIN</label>
                        <input type="text" name="nama" autocomplete="off" class="form-control" placeholder="nama catin..">
                        <input type="hidden" name="username" value="<?php echo $_SESSION['username'] ?>">                   

                      </div>

                    <div class="form-group">
                    <label>NO HP</label>
                    <input type="text" name="no_hp" autocomplete="off" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Upload File</label>
                        <input type="file" name="trnfoto" required="required" class="form-control">
                        <small>File yang di perbolehkan *PDF | *JPG | *jpeg </small>
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
                    <th  class="text-center">TANGGAL BIMWIN</th>
                    <th  class="text-center">NAMA CATIN</th>
                    <th  class="text-center">NO.HP</th>
                    <th  class="text-center">PENYULUH</th>
                    <th  class="text-center">FILE UNDANGAN</th>
                    <th  width="10%" class="text-center">OPSI</th>
                  </tr>
                </thead>
                 <tbody>
                  <?php 
                  include '../koneksi.php';
                  $no=1;
                  $data = mysqli_query($koneksi,"SELECT * FROM binwin,penyuluh where penyuluh.penyuluh_id=binwin.penyuluh ORDER BY binwin_id DESC");
                   while($d = mysqli_fetch_array($data)){
                   ?>
                    <tr>
                      <td class="text-center"><?php echo $no++; ?></td>
                      <td><?php echo $d['jadwal_tgl']; ?></td> 
                      <td><?php echo $d['nama']; ?></td>
                      <td><?php echo $d['no_hp']; ?></td>
                      <td><?php echo $d['penyuluh']; ?></td>                      
                      <td class="text-center"><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#lihat_binwin_<?php echo $d['binwin_id'] ?>">Lihat File</a></td>
                      <td>    

                      <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit_binwin_<?php echo $d['binwin_id'] ?>">
                        <i class="fa fa-cog"></i>
                      </button>
                          <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus_binwin_<?php echo $d['binwin_id'] ?>">
                            <i class="fa fa-trash"></i>
                          </button>
                          <?php 
                        if($d['binwin_id'] != 1){
                          ?>
                          <?php
                        }
                        ?>                      

                      <form action="binwin_update.php" method="post" enctype="multipart/form-data">
                        <div class="modal fade" id="edit_binwin_<?php echo $d['binwin_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title" id="exampleModalLabel">Edit Jadwal</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">

                                <div class="form-group" style="width:100%;margin-bottom:20px">
                                  <label>Mulai</label>
                                  <input type="hidden" name="id" value="<?php echo $d['binwin_id'] ?>">
                                  <input type="datetime-local" style="width:100%" name="jadwal_tgl" required="required" class="form-control datepicker" value="<?php echo $d['jadwal_tgl'] ?>">
                                </div>                      
                                
                                <div class="form-group" style="width:100%;margin-bottom:20px">
                                <label>Selesai</label>
                                  <input type="datetime-local" style="width:100%" name="jadwal_tanggal" required="required" class="form-control datepicker" value="<?php echo $d['jadwal_tanggal'] ?>">
                                </div>                      


                                <div class="form-group" style="width:100%;margin-bottom:20px">
                                <label>NAMA CATIN</label>
                                <input type="text" name="nama" autocomplete="off" style="width:100%" class="form-control" value="<?php echo $d['nama']; ?>">

                                </div>
                                                          
                                <div class="form-group" style="width:100%;margin-bottom:20px">
                                <label>NO.HP</label>
                                <input type="text" name="no_hp" style="width:100%" class="form-control"  value="<?php echo $d['no_hp']; ?>">
                                </div> 

                                <div class="form-group" style="margin-bottom:20px;width: 100%">
                                <label>Penyuluh</label>
                                <select name="penyuluh" style="width:100%" class="form-control" required="required">
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

                               <div class="form-group" style="width:100%;margin-bottom:20px">
                                    <label>Upload File</label>
                                    <input type="file" name="trnfoto" class="form-control"><br>
                                    <!-- <small><?php echo $d['binwin_foto'] ?></small> -->
                                    <p class="help-block">Bila File <?php echo "<a class='fancybox btn btn-xs btn-primary' target=_blank href='../gambar/bukti/$d[binwin_foto]'>$d[binwin_foto]</a>";?> tidak dirubah kosongkan saja</p>
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
    
                            
                      <!-- modal hapus -->
                      <div class="modal fade" id="hapus_binwin_<?php echo $d['binwin_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                              <a href="binwin_hapus.php?id=<?php echo $d['binwin_id'] ?>" class="btn btn-primary">Hapus</a>
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

