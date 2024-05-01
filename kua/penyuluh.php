<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      PENYULUH
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

          <div class="box-header">
            <h3 class="box-title">Daftar Penyuluh</h3>
          </div>
          <div class="box-body">

            <!-- Modal -->
            <form action="penyuluh_act.php" method="post" enctype="multipart/form-data">
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Tambah penyuluh</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">

                      <div class="form-group">
                        <label>Nama Penyuluh</label>
                        <input type="text" name="penyuluh" required="required" class="form-control" placeholder="Nama penyuluh ..">
                      </div>

                      <div class="form-group">
                        <label>Nip Penyuluh</label>
                        <input type="text" name="nip" required="required" class="form-control" placeholder="Nama penyuluh ..">
                      </div>

                    <div class="form-group">
                        <label>Upload File</label>
                        <input type="file" name="trnfoto" required="required" class="form-control">
                        <small>File yang di perbolehkan | *JPG | *jpeg </small>
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
                    <th width="1%">NO</th>
                    <th>NAMA</th>
                    <th>NIP</th>
                    <th>FOTO</th>
                    <th width="10%">OPSI</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  include '../koneksi.php';
                  $no=1;
                  $data = mysqli_query($koneksi,"SELECT * FROM penyuluh ORDER BY penyuluh ASC");
                  while($d = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $d['penyuluh']; ?></td>
                      <td><?php echo $d['nip']; ?></td>
                      <td><embed src="../gambar/bukti/<?php echo $d['penyuluh_foto']; ?>" type="application/pdf" width="100%" height="100px" />

                        </td> 
                      <td>    
                         
                          <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit_penyuluh_<?php echo $d['penyuluh_id'] ?>">
                            <i class="fa fa-cog"></i>
                          </button>

                          <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus_penyuluh_<?php echo $d['penyuluh_id'] ?>">
                            <i class="fa fa-trash"></i>
                          </button>
                          <?php 
                        if($d['penyuluh_id'] != 1){
                          ?>
                          <?php 
                        }
                        ?>

                        <form action="penyuluh_update.php" method="post"enctype="multipart/form-data">
                          <div class="modal fade" id="edit_penyuluh_<?php echo $d['penyuluh_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Edit penyuluh</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">

                                  <div class="form-group" style="width:100%">
                                    <label>Nama Penyuluh</label>
                                    <input type="hidden" name="id" required="required" class="form-control" placeholder="Nama penyuluh .." value="<?php echo $d['penyuluh_id']; ?>">
                                    <input type="text" name="penyuluh" required="required" class="form-control" placeholder="Nama penyuluh .." value="<?php echo $d['penyuluh']; ?>" style="width:100%">
                                  </div>

                                  <div class="form-group" style="width:100%">
                                    <label>Nip Penyuluh</label>
                                    <input type="text" name="nip" required="required" class="form-control" value="<?php echo $d['nip']; ?>" style="width:100%">
                                  </div>

                                  <div class="form-group" style="width:100%;margin-bottom:20px">
                                    <label>Upload File</label>
                                    <input type="file" name="trnfoto" class="form-control"><br>
                                    <!-- <small><?php echo $d['penyuluh_foto'] ?></small> -->
                                    <p class="help-block">Bila File <?php echo "<a class='fancybox btn btn-xs btn-primary' target=_blank href='../gambar/bukti/$d[penyuluh_foto]'>$d[penyuluh_foto]</a>";?> tidak dirubah kosongkan saja</p>
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
                        <div class="modal fade" id="hapus_penyuluh_<?php echo $d['penyuluh_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Peringatan!</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">

                                <p>Yakin ingin menghapus data ini ?</p>

                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <a href="penyuluh_hapus.php?id=<?php echo $d['penyuluh_id'] ?>" class="btn btn-primary">Hapus</a>
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