<?php 
include '../koneksi.php';
$jadwal_tanggal  = $_POST['jadwal_tanggal'];
$username= $_POST['username']; 
$alamat = $_POST['alamat'];
$keperluan  = $_POST['keperluan'];
$status  = $_POST['status'];

$rand = rand();
$allowed =  array('jpg','jpeg','pdf');
$filename = $_FILES['trnfoto']['name'];


if($filename == ""){
	mysqli_query($koneksi, "insert into legalisir values (NULL,'$jadwal_tanggal','$username','$alamat','$keperluan','','$status')")or die(mysqli_error($koneksi));
	header("location:legalisir.php?alert=berhasil");
}else{
	$ext = pathinfo($filename, PATHINFO_EXTENSION);

	if(!in_array($ext,$allowed) ) {
		header("location:legalisir.php?alert=gagal");
	}else{
		move_uploaded_file($_FILES['trnfoto']['tmp_name'], '../gambar/bukti/'.$rand.'_'.$filename);
		$file_gambar = $rand.'_'.$filename;
		mysqli_query($koneksi, "insert into legalisir values  (NULL,'$jadwal_tanggal','$username','$alamat','$keperluan','$file_gambar','$status')");
		header("location:legalisir.php?alert=berhasil");
	}
}

