<?php 
include '../koneksi.php';
$jadwal_tanggal  = $_POST['jadwal_tanggal'];
$name= $_POST['name'];  
$alamat= $_POST['alamat'];  
$mmstatus= $_POST['mmstatus'];  
$luas= $_POST['luas']; 
$penyuluh = $_POST['penyuluh'];


$rand = rand();
$allowed =  array('jpg','jpeg','pdf');
$filename = $_FILES['trnfoto']['name'];


if($filename == ""){
	mysqli_query($koneksi, "insert into mesjid values (NULL,'$jadwal_tanggal','$name','$alamat','$mmstatus','$luas','','$penyuluh')")or die(mysqli_error($koneksi));
	header("location:masjid.php?alert=berhasil");
}else{
	$ext = pathinfo($filename, PATHINFO_EXTENSION);

	if(!in_array($ext,$allowed) ) {
		header("location:masjid.php?alert=gagal");
	}else{
		move_uploaded_file($_FILES['trnfoto']['tmp_name'], '../gambar/bukti/'.$rand.'_'.$filename);
		$file_gambar = $rand.'_'.$filename;
		mysqli_query($koneksi, "insert into mesjid values (NULL,'$jadwal_tanggal','$name','$alamat','$mmstatus','$luas','$file_gambar','$penyuluh')");
		header("location:masjid.php?alert=berhasil");
	}
}


	
