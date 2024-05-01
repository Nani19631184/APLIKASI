<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
<head profile="http://gmpg.org/xfn/11">
<title>KUA KEC. BANJARMASIN TIMUR</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="imagetoolbar" content="no" />
<link rel="stylesheet" href="styles/layout.css" type="text/css" />
<!-- Homepage Specific Elements -->
<script type="text/javascript" src="scripts/jquery-1.4.1.min.js"></script>
<script type="text/javascript" src="scripts/jquery-ui-1.7.2.custom.min.js"></script>
<script type="text/javascript" src="scripts/jquery.tabs.setup.js"></script>
<!-- End Homepage Specific Elements -->
</head>
<body id="top">
<div class="wrapper row2">
  <div class="rnd">
    <div id="container" class="clear">
      <!-- ####################################################################################################### -->
      <div id="homepage" class="clear">
        <!-- ###### -->
        <!-- ###### -->
        <div id="latestnews">
          <h2>BERITA - BERITA TERBARU</h2>
<ul>
 <?php
	include('koneksi.php');
	$ambil_data = mysqli_query($koneksi,"SELECT * FROM tb_article Order By IdBerita DESC LIMIT 3");
	
	while($data = mysqli_fetch_array($ambil_data)){

echo "<li class='clear'>";
echo "<div class='imgl'><img src='images/img.jpg' alt='' width='125' height='125' /></div>";
echo "<div class='latestnews'>";
echo "<p><a href='berita.php'>".$data['Judul']."</a></p>";
echo "<p>".substr(stripslashes($data['Berita']),0,100)."....</p>";
echo "</div>";
echo "</li>";
?>
<?php
	}
?>
</ul>          <p class="readmore"><a href="berita.php">Klik disini untuk melihat semua berita &raquo;</a></p>
        </div>
        <!-- ###### -->
        
        <div id="right_column">
          <div class="holder">
            <h2>PELAYANAN NIKAH</h2>
            
            <p>Silahkan membuat akun terlebih dahulu untuk dapat mengakses pelayanan KUA Kecamatan Banjarmasin Timur</p>
                  <p>Upload berkas persyaratan berupa pdf/jpg pada saat melakukan pendaftaran layanan KUA</p>
                  <br><br>
                  <h2>       </h2>
                    <p class="readmore"><a href="hubin.php">Klik disini untuk melihat persyaratan &raquo;</a></p>

          </div>
        </div>
      <!-- ####################################################################################################### -->
      </div>
      <!-- ####################################################################################################### -->
      <!-- ####################################################################################################### -->
    </div>
  </div>
</div>
</body>
</html>