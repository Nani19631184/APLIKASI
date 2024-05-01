<?php 
include '../koneksi.php';
$tanggal  = $_POST['tanggal'];
$username= $_POST['username']; 
$nominal  = $_POST['nominal'];


$rand = rand();
$allowed =  array('jpg','jpeg','pdf');
$filename = $_FILES['trnfoto']['name'];


if($filename == ""){
	mysqli_query($koneksi, "insert into transaksi values (NULL,'$tanggal', '$username','$nominal','')")or die(mysqli_error($koneksi));
	header("location:transaksi.php?alert=berhasil");
}else{
	$ext = pathinfo($filename, PATHINFO_EXTENSION);

	if(!in_array($ext,$allowed) ) {
		header("location:transaksi.php?alert=gagal");
	}else{
		move_uploaded_file($_FILES['trnfoto']['tmp_name'], '../gambar/bukti/'.$rand.'_'.$filename);
		$file_gambar = $rand.'_'.$filename;
		mysqli_query($koneksi, "insert into transaksi values (NULL,'$tanggal', '$username','$nominal','$file_gambar')");
		header("location:transaksi.php?alert=berhasil");
	}
}
