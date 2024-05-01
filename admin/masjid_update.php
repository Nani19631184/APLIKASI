<?php 
include '../koneksi.php';
$id = $_POST['id'];
$jadwal_tanggal  = $_POST['jadwal_tanggal'];
 $name= $_POST['name'];  
 $alamat= $_POST['alamat'];  
 $mmstatus= $_POST['mmstatus'];  
 $luas= $_POST['luas'];  
 $penyuluh = $_POST['penyuluh'];


 $rand = rand();
$allowed =  array('jpg','jpeg','pdf');
$filename = $_FILES['trnfoto']['name'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

if($filename == ""){
	mysqli_query($koneksi, "update mesjid set jadwal_tanggal='$jadwal_tanggal', name='$name', alamat='$alamat', mmstatus='$mmstatus', luas= '$luas', penyuluh='$penyuluh'  where masjid_id='$id'") or die(mysqli_error($koneksi));
	
     header("location:masjid.php?alert=berhasilupdate");
}else{
	$ext = pathinfo($filename, PATHINFO_EXTENSION);

	if(!in_array($ext,$allowed) ) {
		header("location:masjid.php?alert=gagal");
	}else{
		move_uploaded_file($_FILES['trnfoto']['tmp_name'], '../gambar/bukti/'.$rand.'_'.$filename);
		$xgambar = $rand.'_'.$filename;
		mysqli_query($koneksi, "update mesjid set jadwal_tanggal='$jadwal_tanggal', name='$name', alamat='$alamat', mmstatus='$mmstatus', luas= '$luas', masjid_foto='$xgambar', penyuluh='$penyuluh' where masjid_id='$id'");
		header("location:masjid.php?alert=berhasilupdate");
	}
}

