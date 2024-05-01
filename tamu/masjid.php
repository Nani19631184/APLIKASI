<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Data Masjid
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

        <h4 class="text-black">Laman ini berisi data masjid yang ada di kawasan Kecamatan Banjarmasin Timur Kalimantan Selatan</h4></div>
          <div class="box-header">
            <div class="btn-group pull-right">            

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

            <div class="table-responsive">
            
              <table class="table table-bordered table-striped" id="table-datatable">
                
                <thead>
                  <tr>
                    <th width="1%" >No</th>
                    <th width="10%"  class="text-center">Tanggal</th>
                    <th  class="text-center">Nama Masjid</th>
                    <th class="text-center">Alamat</th>
                    <th  class="text-center">Status</th>
                    <th  class="text-center">Luas Tanah</th>
                    <th  class="text-center">Penyuluh</th>
                    <th  width="12%" class="text-center">Lihat Foto</th>
                  </tr>
                </thead>
                 <tbody>
                  <?php 
                  include '../koneksi.php';
                  $no=1;
                  $data = mysqli_query($koneksi,"SELECT * FROM mesjid,penyuluh where penyuluh.penyuluh_id=mesjid.penyuluh ORDER BY masjid_id DESC");
                   while($d = mysqli_fetch_array($data)){
                   ?>
                    <tr>
                      <td class="text-center"><?php echo $no++; ?></td>
                      <td><?php echo $d['jadwal_tanggal']; ?></td>
                      <td><?php echo $d['name']; ?></td>
                      <td><?php echo $d['alamat']; ?></td>
                      <td class="text-center"><?php echo $d['mmstatus']; ?></td>
                      <td class="text-center"><?php echo $d['luas']; ?></td>          
                      <td><?php echo $d['penyuluh']; ?></td>                                      
        
                      <td class="text-center">

                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#lihat_masjid_<?php echo $d['masjid_id'] ?>">
                        <i class="fa fa-eye"></i>
                         </button>                        

                          <div class="modal fade" id="lihat_masjid_<?php echo $d['masjid_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title" id="exampleModalLabel">Foto Masjid</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <embed src="../gambar/bukti/<?php echo $d['masjid_foto']; ?>" type="application/pdf" width="100%" height="400px" />
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


