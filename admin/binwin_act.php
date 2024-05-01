<?php 
include '../koneksi.php';
$jadwal_tgl = $_POST['jadwal_tgl'];
$jadwal_tanggal = $_POST['jadwal_tanggal'];
$nama= $_POST['nama'];
$username= $_POST['username']; 
$no_hp = $_POST['no_hp'];
$penyuluh = $_POST['penyuluh'];

$rand = rand();
$allowed =  array('jpg','jpeg','pdf');
$filename = $_FILES['trnfoto']['name'];


if($filename == ""){
	mysqli_query($koneksi, "insert into binwin values (NULL,'$jadwal_tgl','$jadwal_tanggal','$nama','$username','$no_hp','','$penyuluh')")or die(mysqli_error($koneksi));
	header("location:binwin.php?alert=berhasil");
}else{
	$ext = pathinfo($filename, PATHINFO_EXTENSION);

	if(!in_array($ext,$allowed) ) {
		header("location:binwin.php?alert=gagal");
	}else{
		move_uploaded_file($_FILES['trnfoto']['tmp_name'], '../gambar/bukti/'.$rand.'_'.$filename);
		$file_gambar = $rand.'_'.$filename;
		mysqli_query($koneksi, "insert into binwin values (NULL,'$jadwal_tgl','$jadwal_tanggal','$nama','$username','$no_hp','$file_gambar','$penyuluh')");
		header("location:binwin.php?alert=berhasil");
	}
}


	




	

