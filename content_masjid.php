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
        <h4><b>MASJID</b></h4>
  <h4 class="text-black">Daftar Masjid yang ada di kawasan Banjarmasin Timur</h4>
  </center>
          </div>
      <!-- ####################################################################################################### -->
      <div class="table-responsive">
            
            <table class="table table-bordered table-striped" id="table-datatable">
              
              <thead>
                <tr>
                  <th  class="text-center">Nama Masjid</th>
                  <th class="text-center">Alamat</th>
                  <th  class="text-center">Status</th>
                    <th  class="text-center">Luas Tanah</th>

                </tr>
              </thead>
               <tbody>
                <?php 


                  include 'koneksi.php';

                  $no=1;
                  $data = mysqli_query($koneksi,"SELECT * FROM mesjid,penyuluh where penyuluh.penyuluh_id=mesjid.penyuluh ORDER BY masjid_id DESC");
                   while($d = mysqli_fetch_array($data)){
                   ?>
                    <tr>
                      <td><?php echo $d['name']; ?></td>
                      <td><?php echo $d['alamat']; ?></td>  
                      <td class="text-center"><?php echo $d['mmstatus']; ?></td>
                      <td class="text-center"><?php echo $d['luas']; ?></td>          
      

                 
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