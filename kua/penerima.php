<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
     PENYALURAN ZAKAT
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
          </div>
          <div class="box-body">
          <div align="right">
    </div>


            <!-- Modal -->
            <form action="penerima_act.php" method="post" enctype="multipart/form-data">
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">TAMBAH PENYALURAN ZAKAT </h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">

                    <div class="form-group">
                        <label>TANGGAL</label>
                        <input type="text" name="tanggal" required="required" class="form-control datepicker2">
                      </div>


                      <div class="form-group">
                        <label>NAMA</label>
                        <input type="text" name="nama" autocomplete="off" class="form-control" placeholder="nama ..">

                      </div>

                      <div class="form-group">
                        <label>NAMA</label>
                        <input type="text" name="namap" autocomplete="off" class="form-control" placeholder="nama ..">

                      </div>

                      <div class="form-group">
                        <label>ALAMAT</label>
                        <input type="text" name="alamat" class="form-control">
                      </div>

                      <div class="form-group">
                        <label>Nominal</label>
                        <input type="number" name="nominal" required="required" class="form-control" placeholder="Masukkan Nominal ..">
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
                    <th width="1%">NO</th>
                    <th>TANGGAL PENYALURAN</th>
                    <th>NAMA PENERIMA</th>
                    <th>NAMA YAYASAN</th>
                    <th>ALAMAT</th>
                    <th>JUMLAH</th>
                    <th>NAMA AMIL</th>
                    <th>FOTO DOKUMENTASI</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  include '../koneksi.php';
                  $no=1;
                  $data = mysqli_query($koneksi,"SELECT * FROM penerima, penyuluh where penyuluh.penyuluh_id=penerima.penyuluh ORDER BY penerima_id DESC");
                  while($d = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $d['tanggal']; ?></td>
                      <td><?php echo $d['nama']; ?></td>
                      <td><?php echo $d['namap']; ?></td>
                      <td><?php echo $d['alamat']; ?></td>
                      <td class="text-center">
                      <?php 
                        echo "Rp. ".number_format($d['penerima_nominal'])." ,-";?></td>
                      <td><?php echo $d['penyuluh']; ?></td>                                      


                      <td class="text-center"><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#lihat_penerima_<?php echo $d['penerima_id'] ?>">Lihat File</a></td>

                        <?php 
                        if($d['penerima_id'] != 1){
                          ?>
                          <?php
                        }
                        ?>

                        <form action="penerima_update.php" method="post" enctype="multipart/form-data">
                          <div class="modal fade" id="edit_penerima_<?php echo $d['penerima_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title" id="exampleModalLabel">Edit</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">

                                <div class="form-group"style="width:100%;margin-bottom:20px">
                        <label>TANGGAL</label>
                        <input type="hidden" name="id" value="<?php echo $d['penerima_id'] ?>">
                      <input type="date" style="width:100%" name="tanggal" required="required" class="form-control datepicker" value="<?php echo $d['tanggal'] ?>">
                      </div>


                      <div class="form-group"style="width:100%;margin-bottom:20px">
                        <label>NAMA</label>
                        <input type="text" name="nama" autocomplete="off" style="width:100%" class="form-control" placeholder="nama .." value="<?php echo $d['nama']; ?>">

                      </div>

                      <div class="form-group"style="width:100%;margin-bottom:20px">
                        <label>NAMA</label>
                        <input type="text" name="namap" autocomplete="off" style="width:100%" class="form-control" value="<?php echo $d['namap']; ?>">

                      </div>

                      <div class="form-group"style="width:100%;margin-bottom:20px">
                        <label>ALAMAT</label>
                        <input type="text" name="alamat" autocomplete="off" style="width:100%" class="form-control" value="<?php echo $d['alamat']; ?>">

                      </div>

                      <div class="form-group"style="width:100%;margin-bottom:20px">
                        <label>Nominal</label>
                        <input type="number" name="nominal" autocomplete="off" style="width:100%" class="form-control"  value="<?php echo $d['penerima_nominal']; ?>">

                      </div>

                      <div class="form-group"style="margin-bottom:20px;width: 100%">
                      <label>Upload File</label>
                                    <input type="file" name="trnfoto" class="form-control"><br>
                                    <!-- <small><?php echo $d['penerima_foto'] ?></small> -->
                                    <p class="help-block">Bila File <?php echo "<a class='fancybox btn btn-xs btn-primary' target=_blank href='../gambar/bukti/$d[penerima_foto]'>$d[penerima_foto]</a>";?> tidak dirubah kosongkan saja</p>
                                  </div>

                    <div class="form-group"style="width:100%;margin-bottom:20px">
                    <label>PENYULUH</label>
                    <select name="penyuluh" style="width:100%" class="form-control" required="required" >
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

                        <div class="modal fade" id="lihat_penerima_<?php echo $d['penerima_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title" id="exampleModalLabel">Lihat Berkas</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <embed src="../gambar/bukti/<?php echo $d['penerima_foto']; ?>" type="application/pdf" width="100%" height="400px" />
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                </div>
                              </div>
                            </div>
                          </div>



                        <!-- modal hapus -->
                        <div class="modal fade" id="hapus_penerima_<?php echo $d['penerima_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <a href="penerima_hapus.php?id=<?php echo $d['penerima_id'] ?>" class="btn btn-primary">Hapus</a>
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