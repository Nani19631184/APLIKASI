<?php 
include '../koneksi.php';
$id  = $_POST['id'];
$jadwal_tanggal  = $_POST['jadwal_tanggal'];
$kecamatan = $_POST['kecamatan'];
$status  = $_POST['status'];

$rand = rand();
$allowed =  array('jpg','jpeg','pdf');
$filename = $_FILES['trnfoto']['name'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

if($filename == ""){
	mysqli_query($koneksi, "update rekomendasi set jadwal_tanggal='$jadwal_tanggal',  kecamatan='$kecamatan', status='$status' where rekomendasi_id='$id'") or die(mysqli_error($koneksi));
	
     header("location:rekomendasi.php?alert=berhasilupdate");
}else{
	$ext = pathinfo($filename, PATHINFO_EXTENSION);

	if(!in_array($ext,$allowed) ) {
		header("location:rekomendasi.php?alert=gagal");
	}else{
		move_uploaded_file($_FILES['trnfoto']['tmp_name'], '../gambar/bukti/'.$rand.'_'.$filename);
		$xgambar = $rand.'_'.$filename;
		mysqli_query($koneksi, "update rekomendasi set jadwal_tanggal='$jadwal_tanggal', kecamatan='$kecamatan', rekomendasi_foto='$xgambar', status='$status' where rekomendasi_id='$id'");
		header("location:rekomendasi.php?alert=berhasilupdate");
	}
}

