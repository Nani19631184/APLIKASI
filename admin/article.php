<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      BERITA
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
            <form action="article_act.php" method="post" enctype="multipart/form-data">
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

                    <div class="form-group" required="required" class="form-control">
                        <label>Judul Berita</label>
                        <input type="text" name="judul" required="required" class="form-control"/>
                      </div>

                    <div class="form-group">
                    <label>Berita</label>
                    <textarea type="textarea" name="berita" required="required" class="form-control"></textarea>
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
                    <th  class="text-center">Judul</th>
                    <th  class="text-center">Berita</th>
                    <th class="text-center">Tanggal</th>
                    <th class="text-center">Jam</th>
                    <th  class="text-center">Penulis</th>
                              <th  width="12%" class="text-center">OPSI</th>
                  </tr>
                </thead>
                 <tbody>
                  <?php 
                  include '../koneksi.php';
                  $no=0;
                  $data = mysqli_query($koneksi,"SELECT * FROM tb_article");
                   while($d = mysqli_fetch_array($data)){
                   ?>
                    <tr>
                    <td><?php echo $no = $no + 1;?></td>
                      <td><?php echo substr(stripslashes($d['Judul']),0,20)."......";?></td>
				<td><?php echo substr(stripslashes($d['Berita']),0,50)."......";?></td>
				<td><?php echo $d['TglBerita'];?></td>
				<td><?php echo $d['JamBerita'];?></td>
				<td><?php echo $d['IdPenulis'];?></td>
                      <td>
                     
                        <a href="article_edit.php?id=<?php echo $d['IdBerita'];?>" class="btn btn-warning btn-sm" ><i class="fa fa-cog"></i></a>
                       
                        <a href="article_hapus.php?id=<?php echo $d['IdBerita']; ?>" onclick="return confirm('Yakin Hapus?')" class="btn btn-danger btn-sm" ><i class="fa fa-trash"></i></a>
                        <?php if($d['IdBerita'] != 1){ ?>
                        <?php } ?>
                              </div>
                            </div>
                          </div>
                        </form>
                           
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


