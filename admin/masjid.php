<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Data Masjid
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

              <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-plus"></i> &nbsp Tambah Data
              </button>
            </div>
           
            
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
            <form action="masjid_act.php" method="post" enctype="multipart/form-data">
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" id="exampleModalLabel">Tambah Data</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">

                    <div class="form-group">
                        <label>TANGGAL</label>
                        <input type="text" name="jadwal_tanggal" required="required" class="form-control datepicker2">
                      </div>

                    <div class="form-group">
                    <label>Nama Masjid</label>
                    <input type="text" name="name" autocomplete="off" class="form-control">
                    </div>

                    <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" name="alamat" autocomplete="off" class="form-control">
                    </div>

                    <div class="form-group">
                    <label>Status</label>
                    <input type="text" name="mmstatus" autocomplete="off" class="form-control">
                    </div>
            
                    <div class="form-group">
                    <label>Luas Tanah</label>
                    <input type="text" name="luas" autocomplete="off" class="form-control">
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
                    <th width="10%"  class="text-center">TANGGAL</th>
                    <th  class="text-center">Nama Masjid</th>
                    <th class="text-center">Alamat</th>
                    <th  class="text-center">STATUS</th>
                    <th  class="text-center">Luas Tanah</th>
                    <th  class="text-center">PENYULUH</th>
                    <th  width="12%" class="text-center">OPSI</th>
                  </tr>
                </thead>
                 <tbody>
                  <?php 
                  include '../koneksi.php';
                  $no=1;
                  $data = mysqli_query($koneksi,"SELECT * FROM mesjid,penyuluh where penyuluh.penyuluh_id=mesjid.penyuluh ORDER BY masjid_id DESC");
                   while($d = mysqli_fetch_array($data)){
                   ?>
                    <tr>
                      <td class="text-center"><?php echo $no++; ?></td>
                      <td><?php echo $d['jadwal_tanggal']; ?></td>
                      <td><?php echo $d['name']; ?></td>
                      <td><?php echo $d['alamat']; ?></td>
                      <td><?php echo $d['mmstatus']; ?></td>
                      <td><?php echo $d['luas']; ?></td>  
                      <td><?php echo $d['penyuluh']; ?></td>                                      
                      <td>
                      <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit_masjid_<?php echo $d['masjid_id'] ?>">
                        <i class="fa fa-cog"></i>
                        </button>

                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#lihat_masjid_<?php echo $d['masjid_id'] ?>">
                        <i class="fa fa-eye"></i>
                         </button>
                       <a href="masjid_hapus.php?id=<?php echo $d['masjid_id']; ?>" onclick="return confirm('Yakin Hapus?')" class="btn btn-danger btn-sm" ><i class="fa fa-trash"></i></a>

                       <form action="masjid_update.php" method="post" enctype="multipart/form-data">
                        <div class="modal fade" id="edit_masjid_<?php echo $d['masjid_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title" id="exampleModalLabel">Edit Masjid</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                              
                              <div class="form-group" style="width:100%;margin-bottom:20px">
                                  <label>Tanggal</label>
                                  <input type="hidden" name="id" value="<?php echo $d['masjid_id'] ?>">
                                  <input type="text" style="width:100%" name="jadwal_tanggal" required="required" class="form-control datepicker2" value="<?php echo $d['jadwal_tanggal'] ?>">
                                </div>                      
                            
                              <div class="form-group" style="width:100%;margin-bottom:20px">
                              <label>Nama Masjid</label>
                                  <input type="text" name="name" style="width:100%" class="form-control" value="<?php echo $d['name'] ?>">
                                </div>                      
                    
                              <div class="form-group" style="width:100%;margin-bottom:20px">
                              <label>Alamat</label>
                                  <input type="text" name="alamat" style="width:100%" class="form-control" value="<?php echo $d['alamat'] ?>">
                                </div>                      

                              <div class="form-group" style="width:100%;margin-bottom:20px">
                              <label>Status</label>
                                  <input type="text" name="mmstatus" style="width:100%" class="form-control" value="<?php echo $d['mmstatus'] ?>">
                                </div> 

                              <div class="form-group" style="width:100%;margin-bottom:20px">
                              <label>Luas</label>
                                  <input type="text" name="luas" style="width:100%" class="form-control" value="<?php echo $d['luas'] ?>">
                                </div>                      

                                <div class="form-group" style="width:100%;margin-bottom:20px">
                                    <label>Upload File</label>
                                    <input type="file" name="trnfoto" class="form-control"><br>
                                    <!-- <small><?php echo $d['masjid_foto'] ?></small> -->
                                    <p class="help-block">Bila File <?php echo "<a class='fancybox btn btn-xs btn-primary' target=_blank href='../gambar/bukti/$d[masjid_foto]'>$d[masjid_foto]</a>";?> tidak dirubah kosongkan saja</p>
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


                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                  <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                              </div>
                            </div>
                          </div>
                          </form>

                          <div class="modal fade" id="lihat_masjid_<?php echo $d['masjid_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title" id="exampleModalLabel">Foto Masjid</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <embed src="../gambar/bukti/<?php echo $d['masjid_foto']; ?>" type="application/pdf" width="100%" height="400px" />
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
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


