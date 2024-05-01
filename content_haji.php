<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
<head profile="http://gmpg.org/xfn/11">
<title>KUA KEC. BANJARMASIN TIMUR</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="imagetoolbar" content="no" />
<link rel="stylesheet" href="styles/layout.css" type="text/css" />
</head>
<body id="top">
<div class="wrapper row3">
  <div class="rnd">
    <div id="container" class="clear">
    <div class="box box-info">
        <div class="alert alert-info text-center">
        <center>
        <h4><b>INFORMASI</b></h4>
  <h4 class="text-black">Pelaksanaan Bimbingan Manasik Haji Kloter 1</h4>
  </center>
          </div>
      <!-- ####################################################################################################### -->
      <div class="table-responsive">  
              <table class="table table-bordered table-striped" id="table-datatable">
                
                <thead>
                  <tr>
                  <th width="1%" >NO </th>
                  <th class="text-center">NO.PENDAFTARAN</th>

                  <th  class="text-center">TANGGAL BIMBINGAN</th>
                    <th  class="text-center">NAMA</th>

                  </tr>
                </thead>
                 <tbody>
                  <?php 


                  include 'koneksi.php';

                  $sql = "SELECT * FROM jhaji,penyuluh where penyuluh.penyuluh_id=jhaji.penyuluh";
                  $data = mysqli_query($koneksi,$sql);
                  $no=1;
                  while ($d = mysqli_fetch_array($data)) {
                   ?>
                    <tr>
                      <td class="text-center"><?php echo $no++; ?></td>
                      <td><?php echo $d['np']; ?></td>

                      <td><?php echo $d['jadwal_tgl']; ?></td> 

                      <td><?php echo $d['nama']; ?></td>
                  </tr>
                  <?php 
                }
                ?>

                
              </tbody>
              
            </table>
      </div>
    </div>
  </section>

      <!-- ####################################################################################################### -->
    </div>
  </div>
</div>
</body>
</html>