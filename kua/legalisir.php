<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      LEGALISIR
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
            <form action="legalisir_act.php"  method="post" enctype="multipart/form-data">
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
												<label>ALAMAT</label>
												<input type="text" name="alamat" class="form-control">
											</div>

											<div class="form-group">
												<label>KEPERLUAN</label>
												<input type="text" name="keperluan" class="form-control">
											</div>

											<div class="form-group">
												<label>FOTO BUKU NIKAH</label>
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
			   <th>TANGGAL</th>
         <th>USERNAME</th>

										<th>ALAMAT</th>
										<th>KEPERLUAN</th>
										<th class="text-center">BUKU NIKAH</th>
										<th class="text-center">STATUS</th>                    
				

                  </tr>
                </thead>
                 <tbody>
                  <?php 
                  include '../koneksi.php';
                  $no=1;
 
				$data = mysqli_query($koneksi,"SELECT * FROM legalisir ORDER BY legalisir_id DESC");
				while($d = mysqli_fetch_array($data)){								

                   ?>
                    <tr>
                      <td class="text-center"><?php echo $no++; ?></td>
                      <td><?php echo $d['jadwal_tanggal']; ?></td> 
                      <td ><?php echo $d['username']; ?></td>
                      <td><?php echo $d['alamat']; ?></td>
                      <td><?php echo $d['keperluan']; ?></td>                      
                      <td class="text-center"><?php echo $d['legalisir_foto']; ?><a href="download.php?filename=<?php echo $d['legalisir_foto']?>">download</a></td>
				  <td><?php

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

