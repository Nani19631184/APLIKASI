<?php 
include '../koneksi.php';
$tanggal  = $_POST['tanggal'];
$nama  = $_POST['nama'];
$namap  = $_POST['namap'];
$alamat = $_POST['alamat'];
$nominal  = $_POST['nominal'];
$penyuluh = $_POST['penyuluh'];

$rand = rand();
$allowed =  array('jpg','jpeg','pdf');
$filename = $_FILES['trnfoto']['name'];

if($filename == ""){

mysqli_query($koneksi, "insert into penerima values (NULL,'$tanggal','$nama','$namap','$alamat','$nominal','','$penyuluh')")or die(mysqli_error($koneksi));
header("location:penerima.php?alert=berhasil");
}else{
	$ext = pathinfo($filename, PATHINFO_EXTENSION);

	if(!in_array($ext,$allowed) ) {
		header("location:penerima.php?alert=gagal");
	}else{
		move_uploaded_file($_FILES['trnfoto']['tmp_name'], '../gambar/bukti/'.$rand.'_'.$filename);
		$file_gambar = $rand.'_'.$filename;
		mysqli_query($koneksi, "insert into penerima values (NULL,'$tanggal','$nama','$namap','$alamat','$nominal','$file_gambar','$penyuluh')");
		header("location:penerima.php?alert=berhasil");
	}
}



	




	

