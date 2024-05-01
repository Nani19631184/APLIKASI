<?php 
include 'header.php';
include '../koneksi.php';
?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
     Berita
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <section class="col-lg-6 col-lg-offset-3">       
        <div class="box box-info">

          <div class="box-header">
          <h3 class="box-title">Edit Berita</h3>
            <a href="article.php" class="btn btn-info btn-sm pull-right"><i class="fa fa-reply"></i> &nbsp; Kembali</a> 
          </div>
          <div class="box-body">
            <form action="article_update.php" method="post" enctype="multipart/form-data">
              <?php 
              $id = $_GET['id'];
              $data = mysqli_query($koneksi,"SELECT * FROM tb_article where IdBerita='$id'");
              while($d = mysqli_fetch_array($data)){
              ?>
                <div class="form-group">
                  <label>Judul Berita</label>
                        <input type="hidden" class="form-control" name="id" value="<?php echo $d['IdBerita'];?>" required="required">
                        <input type="text" class="form-control" name="judul" value="<?php echo $d['Judul'];?>" required="required">
                </div>
                <div class="form-group" style="width:100%">
                      </div>
                      <?php
			echo '<div class="form-group"><label> Berita</label>
	  <textarea type="text" name="berita" class="form-control">' .stripslashes($d['Berita']) .'</textarea> </div>';
			?>
                        

                <div class="form-group">
                  <input type="submit" class="btn btn-sm btn-primary" value="Simpan">
                </div>
                
                <?php
              }

              ?>
              
            </form>
          </div>

        </div>
      </section>
    </div>
  </section>

</div>
<?php include 'footer.php'; ?>


