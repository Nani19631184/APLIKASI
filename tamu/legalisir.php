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
        <h4><b>INFORMASI</b></h4>

        <h4 class="text-black">Klik tombol Daftar dan isi data anda beserta upload foto buku nikah </h4></div>

          <div class="box-header">
            <div class="btn-group pull-right">            
              <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-plus"></i> &nbsp Daftar 
              </button>
            </div>
          </div>
          <div class="box-body">
          <div align="right">
    </div>


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
                     <input type="hidden" name="username" value="<?php echo $_SESSION['username'] ?>">                   

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

										<th>ALAMAT</th>
										<th>KEPERLUAN</th>
										<th>FOTO BUKU NIKAH</th>
										<th>STATUS</th>                    				

                  </tr>
                </thead>
                 <tbody>
                  <?php 
                  include '../koneksi.php';
                  $no=1;
 
                  $sql = "SELECT * FROM legalisir WHERE username='".$_SESSION['username']."'";
                  $data = mysqli_query($koneksi,$sql);
      while($d = mysqli_fetch_array($data)){								

                   ?>
                    <tr>
                      <td class="text-center"><?php echo $no++; ?></td>
                      <td><?php echo $d['jadwal_tanggal']; ?></td> 
                      <td><?php echo $d['alamat']; ?></td>
                      <td><?php echo $d['keperluan']; ?></td>                      
                      <td><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#lihat_legalisir_<?php echo $d['legalisir_id'] ?>">Lihat File</a></td>
				  <td><?php

if ($d['status'] == 0) {

echo "<span class='label label-warning badge-pill'>Belum Dikonfirmasi</span>";
}
else{
echo "<span class='label label-pill label-success'>Pengajuan Disetujui</span>";

}?></td>

<div class="modal fade" id="lihat_legalisir_<?php echo $d['legalisir_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title" id="exampleModalLabel">Lihat Berkas</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <embed src="../gambar/bukti/<?php echo $d['legalisir_foto']; ?>" type="application/pdf" width="100%" height="400px" />
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