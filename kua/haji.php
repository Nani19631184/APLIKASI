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




            <div class="table-responsive">
              <table class="table table-bordered table-striped" id="table-datatable">
                <thead>
                  <tr>
                    <th width="1%">NO</th>
                    <th>USERNAME</th>

                    <th>ALAMAT</th>
                    <th>NO.HP</th>
                    <th>FILE</th>
                    <th>STATUS</th>
                    <th  width="10%" class="text-center">OPSI</th>

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