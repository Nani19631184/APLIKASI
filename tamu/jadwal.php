<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      PENDAFTARAN JADWAL NIKAH
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

        <h4 class="text-black">Setelah anda melakukan pendaftaran tanggal akad nikah, jadwal bimbingan perkawinan akan segera diproses<br> Cek jadwal bimbingan perkawinan anda di laman Jadwal Bimwin</h4>

          </div>
          <div class="box-header">
            <div class="btn-group pull-right">            
            <a href="event.php" style="margin:5px;" class="btn btn-info btn-sm" ><i class="fa fa-eye">Lihat Agenda</i></a>
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
            <form action="jadwal_act.php" method="post">
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
                        <input type="hidden" name="id" value="<?php echo $d['jadwal_id'] ?>">
                        <input type="text" name="jadwal_tanggal" required="required" class="form-control datepicker2">
                      </div>



                      <div class="form-group">
                        <label>NAMA CATIN BIN/BINTI</label>
                        <input type="text" name="nama" autocomplete="off" class="form-control" placeholder="nama catin..">
                        <input type="hidden" name="username" value="<?php echo $_SESSION['username'] ?>">                   

                      </div>

                      <div class="form-group">
                        <label>WALI NIKAH (NASAB/HAKIM)</label>
                        <input type="text" name="wali" class="form-control" placeholder="wali nikah ..">
                      </div>                 

                      <div class="form-group">
                        <label>TANGGAL NIKAH</label>
                        <input type="datetime-local" name="jadwal_tgl" required="required" class="form-control">
                      </div>
                      
                      <div class="form-group">
                        <label>TEMPAT NIKAH</label>
                        <input type="text" name="tempat" class="form-control" placeholder="tempat nikah ..">
                      </div>

                      <div class="form-group">
                        <label>No.Hp</label>
                        <input type="text" name="no_hp" class="form-control" >                        
                      </div>

                      <div class="form-group">
                        <label>PENGHULU</label>
                        <select name="penghulu" class="form-control" required="required">
                          <option value="">- Pilih -</option>
                          <?php 
                          $penghulu = mysqli_query($koneksi,"SELECT * FROM penghulu ORDER BY penghulu ASC");
                          while($k = mysqli_fetch_array($penghulu)){
                            ?>
                            <option value="<?php echo $k['penghulu_id']; ?>"><?php echo $k['penghulu']; ?></option>
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
                    <th  class="text-center">NAMA CATIN</th>
                    <th  class="text-center">WALI<br>NIKAH</th>
                    <th  class="text-center">TANGGAL<br>NIKAH</th>
                    <th  class="text-center">TEMPAT<br>NIKAH</th>
                    <th  class="text-center">NO.HP</th>
                    <th  class="text-center">PENGHULU</th>
                    <th  width="10%" class="text-center">UBAH DATA</th>

                  </tr>
                  
                </thead>

                 <tbody>

                  <?php 
                  include '../koneksi.php';

                  $sql = "SELECT * FROM jadwal,penghulu WHERE penghulu.penghulu_id=jadwal.penghulu and username='".$_SESSION['username']."'";
                  $data = mysqli_query($koneksi,$sql);
                  $no=1;
                  while ($d = mysqli_fetch_array($data)) {
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
                     
                      <td>    

                      <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit_jadwal_<?php echo $d['jadwal_id'] ?>">
                        <i class="fa fa-cog"></i>
                      </button>

                        <?php 
                        if($d['jadwal_id'] != 1){
                          ?>
                          <?php
                        }
                        ?>                      

                      <form action="jadwal_update.php" method="post" enctype="multipart/form-data">
                        <div class="modal fade" id="edit_jadwal_<?php echo $d['jadwal_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                  <input type="hidden" name="id" value="<?php echo $d['jadwal_id'] ?>">
                                  <input type="text" style="width:100%" name="jadwal_tanggal" required="required" class="form-control datepicker2" value="<?php echo $d['jadwal_tanggal'] ?>">
                                </div>                      
                                
                                

                                <div class="form-group" style="width:100%;margin-bottom:20px">
                                <label>NAMA CATIN(Bin/Binti)</label>
                                <input type="text" name="nama" autocomplete="off" style="width:100%" class="form-control" value="<?php echo $d['nama']; ?>">

</div>

                                <div class="form-group" style="width:100%;margin-bottom:20px">                                
                                <label>WALI NIKAH nasab/hakim</label>
                                <input type="text" name="wali" style="width:100%" class="form-control" placeholder="wali .."value="<?php echo $d['wali']; ?>">
                                </div>                    
                                
                                <div class="form-group" style="width:100%;margin-bottom:20px">
                                  <label>Tanggal Nikah</label>                                  
                                  <input type="datetime-local" style="width:100%" name="jadwal_tgl" required="required" class="form-control datepicker" value="<?php echo $d['jadwal_tgl']; ?>">
                                </div>   
                              
                                <div class="form-group" style="width:100%;margin-bottom:20px">
                                <label>TEMPAT NIKAH</label>
                                <input type="text" name="tempat" style="width:100%" class="form-control" placeholder="tempat nikah .."value="<?php echo $d['tempat']; ?>">
                                </div> 


                                <div class="form-group" style="width:100%;margin-bottom:20px">
                                <label>NO.HP</label>
                                <input type="text" name="no_hp" style="width:100%" class="form-control"  value="<?php echo $d['no_hp']; ?>">
                                </div> 

                                <div class="form-group" style="margin-bottom:20px;width: 100%">
                                <label>PENGHULU</label>
                                <select name="penghulu" style="width:100%" class="form-control" required="required">
                                    <option value="">- Pilih -</option>
                                    <?php 
                                    $penghulu = mysqli_query($koneksi,"SELECT * FROM penghulu ORDER BY penghulu ASC");
                                    while($k = mysqli_fetch_array($penghulu)){
                                      ?>
                                     <option value="<?php echo $k['penghulu_id']; ?>"><?php echo $k['penghulu']; ?></option>
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

