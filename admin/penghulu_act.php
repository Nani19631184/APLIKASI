<?php 
include '../koneksi.php';
$penghulu  = $_POST['penghulu'];
$nip  = $_POST['nip'];

$rand = rand();
$allowed =  array('jpg','jpeg');
$filename = $_FILES['trnfoto']['name'];


if($filename == ""){
	mysqli_query($koneksi, "insert into penghulu values (NULL,'$penghulu','$nip','')")or die(mysqli_error($koneksi));
	header("location:penghulu.php?alert=berhasil");
}else{
	$ext = pathinfo($filename, PATHINFO_EXTENSION);

	if(!in_array($ext,$allowed) ) {
		header("location:penghulu.php?alert=gagal");
	}else{
		move_uploaded_file($_FILES['trnfoto']['tmp_name'], '../gambar/bukti/'.$rand.'_'.$filename);
		$file_gambar = $rand.'_'.$filename;
		mysqli_query($koneksi, "insert into penghulu values (NULL,'$penghulu','$nip','$file_gambar')");
		header("location:penghulu.php?alert=berhasil");
	}
}



