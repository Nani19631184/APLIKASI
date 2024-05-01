<?php 
include '../koneksi.php';
$penyuluh  = $_POST['penyuluh'];
$nip  = $_POST['nip'];

$rand = rand();
$allowed =  array('jpg','jpeg');
$filename = $_FILES['trnfoto']['name'];


if($filename == ""){
	mysqli_query($koneksi, "insert into penyuluh values (NULL,'$penyuluh','$nip','')")or die(mysqli_error($koneksi));
	header("location:penyuluh.php?alert=berhasil");
}else{
	$ext = pathinfo($filename, PATHINFO_EXTENSION);

	if(!in_array($ext,$allowed) ) {
		header("location:penyuluh.php?alert=gagal");
	}else{
		move_uploaded_file($_FILES['trnfoto']['tmp_name'], '../gambar/bukti/'.$rand.'_'.$filename);
		$file_gambar = $rand.'_'.$filename;
		mysqli_query($koneksi, "insert into penyuluh values (NULL,'$penyuluh','$nip','$file_gambar')");
		header("location:penyuluh.php?alert=berhasil");
	}
}



