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
      <!-- ####################################################################################################### -->

 <?php
	include('koneksi.php');
	$ambil_data = mysqli_query($koneksi,"select * from tb_article Order By IdBerita DESC");
	
	while($data = mysqli_fetch_array($ambil_data)){


echo "<left><h1><strong>".$data['Judul']."</strong></h1></left>";
echo "<font size='2' color='green'>Tangggal ".$data['TglBerita']." Jam ".$data['JamBerita']."</font></br>";
echo "<left><p>".$data['Berita'];

echo "<BR>";
echo "<BR>";
?>
<?php
	}
?>

      <!-- ####################################################################################################### -->
    </div>
  </div>
</div>
</body>
</html>