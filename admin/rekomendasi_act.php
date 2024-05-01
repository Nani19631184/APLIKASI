<?php 
include '../koneksi.php';
$jadwal_tanggal  = $_POST['jadwal_tanggal'];
$kecamatan= $_POST['kecamatan'];  
$status  = $_POST['status'];

$rand = rand();
$allowed =  array('jpg','jpeg','pdf');

$filename = $_FILES['trnfoto']['name'];

if($filename == ""){
	mysqli_query($koneksi, "insert into rekomendasi values (NULL,'$jadwal_tanggal','$kecamatan','','$status')")or die(mysqli_error($koneksi));
	header("location:rekomendasi.php?alert=berhasil");
}else{
	$ext = pathinfo($filename, PATHINFO_EXTENSION);

	if(!in_array($ext,$allowed) ) {
		header("location:rekomendasi.php?alert=gagal");
	}else{
		move_uploaded_file($_FILES['trnfoto']['tmp_name'], '../gambar/bukti/'.$rand.'_'.$filename);
		$file_gambar = $rand.'_'.$filename;
		mysqli_query($koneksi, "insert into rekomendasi values (NULL,'$jadwal_tanggal','$kecamatan','$file_gambar','$status')");
		header("location:rekomendasi.php?alert=berhasil");
	}
}




                



