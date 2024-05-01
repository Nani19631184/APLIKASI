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
        <div class="alert alert-info text-center">
        <h4><b>INFORMASI</b></h4>
        <h4 class="text-black">Laman ini berisi data penyaluran zakat kepada mustahik/orang yang menerima zakat </h4></div>

          <div class="box-header">
            <div class="btn-group pull-right">            
            </div>
          </div>
          <div class="box-body">
          <div align="right">
    </div>


            <!-- Modal -->


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