<?php 
include '../koneksi.php';
$jadwal_tanggal = $_POST['jadwal_tanggal'];
$username= $_POST['username']; 
$alamat = $_POST['alamat'];
$no_hp = $_POST['no_hp'];
$status = $_POST['status'];

$rand = rand();
$allowed =  array('jpg','jpeg','pdf');
$filename = $_FILES['trnfoto']['name'];


if($filename == ""){
	mysqli_query($koneksi, "insert into haji values (NULL,'$jadwal_tanggal','$username','$alamat','$no_hp','','$status')")or die(mysqli_error($koneksi));
	header("location:haji.php?alert=berhasil");
}else{
	$ext = pathinfo($filename, PATHINFO_EXTENSION);

	if(!in_array($ext,$allowed) ) {
		header("location:haji.php?alert=gagal");
	}else{
		move_uploaded_file($_FILES['trnfoto']['tmp_name'], '../gambar/bukti/'.$rand.'_'.$filename);
		$file_gambar = $rand.'_'.$filename;
		mysqli_query($koneksi, "insert into haji values (NULL,'$jadwal_tanggal','$username','$alamat','$no_hp','$file_gambar','$status')");
		header("location:haji.php?alert=berhasil");
	}
}


	




	

