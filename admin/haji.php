<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
     BIMBINGAN MANASIK HAJI    
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

          <div class="box-body">
          <div align="right">
    </div>


            <!-- Modal -->
            <form action="haji_act.php" method="post" enctype="multipart/form-data">
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Daftar Bimbingan Manasik Haji</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">

                      <div class="form-group">
                        <label>ALAMAT</label>
                        <input type="text" name="alamat" class="form-control">
                      </div>

                      <div class="form-group">
                        <label>NO.HP</label>
                        <input type="text" name="no_hp" class="form-control">
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
                    <th width="1%">NO</th>
                    <th>TANGGAL</th>

                    <th>USERNAME</th>

                    <th>ALAMAT</th>
                    <th>NO.HP</th>
                    <th>FILE</th>
                    <th>STATUS</th>
                    <th width="10%">OPSI</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  include '../koneksi.php';
                  $no=1;
                  $data = mysqli_query($koneksi,"SELECT * FROM haji ORDER BY haji_id DESC");
                  while($d = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td class="text-center"><?php echo $d['jadwal_tanggal']; ?></td>
                      <td><?php echo $d['username']; ?></td>
                      <td><?php echo $d['alamat']; ?></td>
                      <td><?php echo $d['no_hp']; ?></td>
                      <td class="text-center"><?php echo $d['haji_foto']; ?><a href="download.php?filename=<?php echo $d['haji_foto']?>">download</a></td>

                      <td><?php

										if ($d['status'] == 0) {

										echo "<span class='label label-warning badge-pill'>Belum Dikonfirmasi</span>";
										}
										else{
										echo "<span class='label label-pill label-success'>Pengajuan Disetujui</span>";
										
									}?></td> 

                      <td>    
                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit_haji_<?php echo $d['haji_id'] ?>">
                          <i class="fa fa-cog"></i>
                        </button>

                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus_haji_<?php echo $d['haji_id'] ?>">
                            <i class="fa fa-trash"></i>
                        </button>
                        <?php 
                        if($d['haji_id'] != 1){
                          ?>
                          <?php
                        }
                        ?>

                        <form action="haji_update.php" method="post" enctype="multipart/form-data">
                          <div class="modal fade" id="edit_haji_<?php echo $d['haji_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title" id="exampleModalLabel">Edit</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">


                                  <div class="form-group" style="margin-bottom:15px;width: 100%">
                                    <label>ALAMAT</label>
                                    <input type="text" name="alamat" style="width:100%" class="form-control" placeholder="keperluan .." value="<?php echo $d['alamat']; ?>">
                                  </div>

                                  <div class="form-group" style="margin-bottom:15px;width: 100%">
                                    <label>NO.HP</label>
                                    <input type="text" name="no_hp" autocomplete="off" style="width:100%" class="form-control" value="<?php echo $d['no_hp']; ?>">
                                  </div>

                                  <div class="form-group" style="width:100%;margin-bottom:20px">
                                    <label>Upload File</label>
                                    <input type="file" name="trnfoto" class="form-control"><br>
                                    <!-- <small><?php echo $d['haji_foto'] ?></small> -->
                                    <p class="help-block">Bila File <?php echo "<a class='fancybox btn btn-xs btn-primary' target=_blank href='../gambar/bukti/$d[haji_foto]'>$d[haji_foto]</a>";?> tidak dirubah kosongkan saja</p>
                                  </div>



                                  <div class="form-group" style="margin-bottom:15px;width: 100%">
                                  <label>Status</label>
                                  <select name="status" id="status" style="width:100%" class="form-control" required="required" >
                                  <option value="0" <?php echo isset($status) && $status == 10 ? "selected" : "" ?>>Belum Dikonfirmasi</option>
                                  <option value="1" <?php echo isset($status) && $status == 1 ? "selected" : "" ?>>Pengajuan Disetujui</option>
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

                        <div class="modal fade" id="lihat_haji_<?php echo $d['haji_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title" id="exampleModalLabel">Lihat Berkas</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <embed src="../gambar/bukti/<?php echo $d['haji_foto']; ?>" type="application/pdf" width="100%" height="400px" />
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                </div>
                              </div>
                            </div>
                          </div>



                        <!-- modal hapus -->
                        <div class="modal fade" id="hapus_haji_<?php echo $d['haji_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <a href="haji_hapus.php?id=<?php echo $d['haji_id'] ?>" class="btn btn-primary">Hapus</a>
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