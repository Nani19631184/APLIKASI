<?php include 'header.php'; 
    ?>


<div class="content-wrapper">

  <section class="content-header">
    <h1>
      REKOMENDASI NIKAH
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
            <form action="rekomendasi_act.php" method="post" enctype="multipart/form-data">
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
                    <label>Nama</label>
                    <input type="text" name="nama" autocomplete="off" class="form-control">
                    <input type="hidden" name="username" value="<?php echo $_SESSION['username'] ?>">                   
                    </div>

                    <div class="form-group">
                    <label>Kecamatan KUA</label>
                    <input type="text" name="kecamatan" autocomplete="off" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Upload File</label>
                        <input type="file" name="trnfoto" required="required" class="form-control">
                        <small>File yang di perbolehkan *PDF | *JPG | *jpeg </small>
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
                    <th  class="text-center">Nama</th>
                    <th  class="text-center">user</th>
                    <th class="text-center">Kecamatan KUA</th>
                    <th  class="text-center">Status</th>
                  </tr>
                </thead>
                 <tbody>
                 <?php 
                  include '../koneksi.php';
                    $sql = "SELECT * FROM rekomendasi WHERE username='".$_SESSION['username']."'";
                    $data = mysqli_query($koneksi,$sql);
                    $no=1;
                    while ($d = mysqli_fetch_assoc($data)) {
                    ?>

                    <tr>
                      <td class="text-center"><?php echo $no++; ?></td>
                      <td class="text-center"><?php echo $d['jadwal_tanggal']; ?></td>
                      <td class="text-center"><?php echo $d['nama']; ?></td>
                      <td ><?php echo $_SESSION['username']; ?></td>
                      <td class="text-center"><?php echo $d['kecamatan']; ?></td>
                      <td class="text-center">
							        <?php

										if ($d['status'] == 0) {

                      echo "<span class='label label-warning badge-pill'>Belum Dikonfirmasi</span>";
										}
										else{
										echo "<span class='label label-pill label-success'>Pengajuan Disetujui</span>";
										
									}?></td> 

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


