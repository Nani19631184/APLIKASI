<?php 
include '../koneksi.php';
$id  = $_POST['id'];
$tanggal  = $_POST['tanggal'];
$username= $_POST['username']; 
$nominal  = $_POST['nominal'];

$rand = rand();
$allowed =  array('jpg','jpeg','pdf');
$filename = $_FILES['trnfoto']['name'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);


if($filename == ""){
	mysqli_query($koneksi, "update transaksi set transaksi_tanggal='$tanggal', username='$username', transaksi_nominal='$nominal' where transaksi_id='$id'") or die(mysqli_error($koneksi));
	header("location:transaksi.php?alert=berhasilupdate");
}else{
	$ext = pathinfo($filename, PATHINFO_EXTENSION);

	if(!in_array($ext,$allowed) ) {
		header("location:transaksi.php?alert=gagal");
	}else{
		move_uploaded_file($_FILES['trnfoto']['tmp_name'], '../gambar/bukti/'.$rand.'_'.$filename);
		$xgambar = $rand.'_'.$filename;
		mysqli_query($koneksi, "update transaksi set transaksi_tanggal='$tanggal', username='$username', transaksi_nominal='$nominal', transaksi_foto='$xgambar' where transaksi_id='$id'");
		header("location:transaksi.php?alert=berhasilupdate");
	}
}
