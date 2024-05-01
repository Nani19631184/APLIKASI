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
          </div>
          <div class="box-header">
            <div class="btn-group pull-right">            
            <a href="event.php" style="margin:5px;" class="btn btn-info btn-sm" ><i class="fa fa-eye"> &nbsp Lihat Agenda</i></a>
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
          


            <div class="table-responsive">
            
              <table class="table table-bordered table-striped" id="table-datatable">
                
                <thead>
                  <tr>
                    <th width="1%" >NO</th>
                    <th width="10%"  class="text-center">TANGGAL PENDAFTARAN</th>
                    <th  class="text-center">NAMA CATIN PRIA DAN WANITA</th>
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
                  $data = mysqli_query($koneksi,"SELECT * FROM jadwal,penghulu where penghulu.penghulu_id=jadwal.penghulu ORDER BY jadwal_id DESC");
                   while($d = mysqli_fetch_array($data)){
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
        </div>

      </div>
    </section>
  </div>
</section>

</div>
<?php include 'footer.php'; ?>

