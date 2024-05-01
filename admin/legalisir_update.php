<?php 
include '../koneksi.php';
$id  = $_POST['id'];
$jadwal_tanggal  = $_POST['jadwal_tanggal'];
$alamat = $_POST['alamat'];
$keperluan  = $_POST['keperluan'];
$status  = $_POST['status'];



$rand = rand();
$allowed =  array('jpg','jpeg','pdf');
$filename = $_FILES['trnfoto']['name'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

if($filename == ""){
     mysqli_query($koneksi, "UPDATE legalisir set jadwal_tanggal='$jadwal_tanggal', alamat='$alamat', keperluan='$keperluan', status='$status' where legalisir_id='$id'")or die(mysqli_error($koneksi));
header("location:legalisir.php");
}else{
	$ext = pathinfo($filename, PATHINFO_EXTENSION);

	if(!in_array($ext,$allowed) ) {
		header("location:legalisir.php?alert=gagal");
	}else{
		move_uploaded_file($_FILES['trnfoto']['tmp_name'], '../gambar/bukti/'.$rand.'_'.$filename);
		$xgambar = $rand.'_'.$filename;
		mysqli_query($koneksi, "UPDATE legalisir set jadwal_tanggal='$jadwal_tanggal', alamat='$alamat', keperluan='$keperluan', legalisir_foto='$xgambar', status='$status' where legalisir_id='$id'");
          
		header("location:legalisir.php?alert=berhasilupdate");
	}
}
