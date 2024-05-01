<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      JADWAL BIMBINGAN MANASIK HAJI
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
            <a href="event2.php" style="margin:5px;" class="btn btn-info btn-sm" ><i class="fa fa-eye"> &nbsp Lihat Agenda</i></a>
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
            <form action=" jhaji_act.php" method="post" enctype="multipart/form-data">
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
                        <label>TANGGAL</label>
                        <input type="text" name="jadwal_tanggal" required="required" class="form-control datepicker2">
                      </div>

                      <div class="form-group">
                        <label>NOMOR PENDAFTARAN</label>
                        <input type="text" name="np" class="form-control">
                      </div>

                    <div class="form-group">
                        <label>NAMA </label>
                        <input type="text" name="nama" autocomplete="off" class="form-control">
                        <input type="hidden" name="username" value="<?php echo $_SESSION['username'] ?>">                   

                      </div>

                      <div class="form-group">
                        <label>ALAMAT</label>
                        <input type="text" name="alamat" class="form-control">
                      </div>

                      <div class="form-group">
                    <label>TANGGAL</label>
                    <input type="datetime-local" name="jadwal_tgl" required="required" class="form-control">
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
                  <th class="text-center">NO.PENDAFTARAN</th>

                    <th  class="text-center">NAMA</th>
                    <th  class="text-center">ALAMAT</th>
                    <th  class="text-center">TANGGAL BIMBINGAN</th>
                    <th  class="text-center">PENYULUH</th>

                    <th  width="10%" class="text-center">OPSI</th>
                  </tr>
                </thead>
                 <tbody>
                  <?php 
                  include '../koneksi.php';
                  $no=1;
                  $data = mysqli_query($koneksi,"SELECT * FROM jhaji,penyuluh where penyuluh.penyuluh_id=jhaji.penyuluh ORDER BY jhaji_id DESC");
                  while($d = mysqli_fetch_array($data)){
                   ?>
                    <tr>
                      <td class="text-center"><?php echo $no++; ?></td>
                      <td><?php echo $d['jadwal_tanggal']; ?></td> 
                      <td><?php echo $d['np']; ?></td>
                      <td><?php echo $d['nama']; ?></td>
                      <td><?php echo $d['alamat']; ?></td>
                      <td><?php echo $d['jadwal_tgl']; ?></td> 
                      <td><?php echo $d['penyuluh']; ?></td>

                      <td>    

                      <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit_jhaji_<?php echo $d['jhaji_id'] ?>">
                        <i class="fa fa-cog"></i>
                      </button>
                          <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus_jhaji_<?php echo $d['jhaji_id'] ?>">
                            <i class="fa fa-trash"></i>
                          </button>
                          <?php 
                        if($d['jhaji_id'] != 1){
                          ?>
                          <?php
                        }
                        ?>                      

                      <form action="jhaji_update.php" method="post">
                        <div class="modal fade" id="edit_jhaji_<?php echo $d['jhaji_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                  <label>Tanggal</label>
                                  <input type="hidden" name="id" value="<?php echo $d['jhaji_id'] ?>">
                                  <input type="text" style="width:100%" name="jadwal_tanggal" required="required" class="form-control datepicker2" value="<?php echo $d['jadwal_tanggal'] ?>">
                                </div>                      

                                <div class="form-group" style="width:100%;margin-bottom:20px">
                                <label>NOMOR PENDAFTARAN</label>
                                <input type="text" name="np" style="width:100%" class="form-control"  value="<?php echo $d['np']; ?>">
                                </div> 


                                <div class="form-group" style="width:100%;margin-bottom:20px">
                                  <label>NAMA</label>
                                  <input type="text" name="nama" autocomplete="off" style="width:100%" class="form-control" value="<?php echo $d['nama']; ?>">

                                </div>                      
                              
                                <div class="form-group" style="width:100%;margin-bottom:20px">
                                <label>TANGGAL</label>
                                <input type="datetime-local" style="width:100%" name="jadwal_tgl" required="required" class="form-control datepicker" value="<?php echo $d['jadwal_tgl'] ?>">
                                </div>
                                                          
                                <div class="form-group" style="width:100%;margin-bottom:20px">
                                <label>ALAMAT</label>
                                <input type="text" name="alamat" style="width:100%" class="form-control"  value="<?php echo $d['alamat']; ?>">
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


    
                            
                      <!-- modal hapus -->
                      <div class="modal fade" id="hapus_jhaji_<?php echo $d['jhaji_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                              <a href="jhaji_hapus.php?id=<?php echo $d['jhaji_id'] ?>" class="btn btn-primary">Hapus</a>
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

