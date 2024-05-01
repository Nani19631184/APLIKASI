<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      JADWAL BIMBINGAN PERKAWINAN
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
            <a href="event1.php" style="margin:5px;" class="btn btn-info btn-sm" ><i class="fa fa-eye"> &nbsp Lihat Agenda</i></a>
            </div><hr>

         
          
                 
          <div class="box-body">
          


            <div class="table-responsive">
            
              <table class="table table-bordered table-striped" id="table-datatable">
                
                <thead>
                  <tr>
                  <th width="1%" >NO</th>
                    <th  class="text-center">TANGGAL BIMWIN</th>
                    <th  class="text-center">NAMA CATIN</th>
                    <th  class="text-center">NO.HP</th>
                    <th  class="text-center">PENYULUH</th>
                    <th  class="text-center">FILE UNDANGAN</th>
                    <th  width="10%" class="text-center">OPSI</th>

                  </tr>
                </thead>
                 <tbody>
                  <?php 
                  include '../koneksi.php';
                  $no=1;
                  $data = mysqli_query($koneksi,"SELECT * FROM binwin,penyuluh where penyuluh.penyuluh_id=binwin.penyuluh ORDER BY binwin_id DESC");
                   while($d = mysqli_fetch_array($data)){
                   ?>
                    <tr>
                      <td class="text-center"><?php echo $no++; ?></td>
                      <td><?php echo $d['jadwal_tgl']; ?></td> 
                      <td><?php echo $d['nama']; ?></td>
                      <td><?php echo $d['no_hp']; ?></td>
                      <td><?php echo $d['penyuluh']; ?></td>                      
                      <td class="text-center"><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#lihat_binwin_<?php echo $d['binwin_id'] ?>">Lihat File</a></td>
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

