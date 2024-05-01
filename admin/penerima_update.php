<?php 
include '../koneksi.php';
$id  = $_POST['id'];
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

     mysqli_query($koneksi, "update penerima set tanggal='$tanggal', nama='$nama', namap='$namap', alamat='$alamat', penerima_nominal='$nominal', penyuluh='$penyuluh' where penerima_id='$id'") or die(mysqli_error($koneksi));
	
     header("location:penerima.php?alert=berhasilupdate");
     }else{
	$ext = pathinfo($filename, PATHINFO_EXTENSION);

	if(!in_array($ext,$allowed) ) {
		header("location:penerima.php?alert=gagal");
	}else{
		move_uploaded_file($_FILES['trnfoto']['tmp_name'], '../gambar/bukti/'.$rand.'_'.$filename);
		$xgambar = $rand.'_'.$filename;
		mysqli_query($koneksi, "update penerima set tanggal='$tanggal', nama='$nama', namap='$namap', alamat='$alamat', penerima_nominal='$nominal', penerima_foto='$xgambar', penyuluh='$penyuluh' where penerima_id='$id'");
		header("location:penerima.php?alert=berhasil");
	}
}





	




	

