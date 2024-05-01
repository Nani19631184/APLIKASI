<?php 
include '../koneksi.php';
$id  = $_POST['id'];
$penyuluh  = $_POST['penyuluh'];
$nip = $_POST['nip'];

$rand = rand();
$allowed =  array('jpg','jpeg','pdf');
$filename = $_FILES['trnfoto']['name'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

if($filename == ""){
	mysqli_query($koneksi, "update penyuluh set penyuluh='$penyuluh', nip='$nip' where penyuluh_id='$id'") or die(mysqli_error($koneksi));
	
     header("location:penyuluh.php?alert=berhasilupdate");
}else{
	$ext = pathinfo($filename, PATHINFO_EXTENSION);

	if(!in_array($ext,$allowed) ) {
		header("location:penyuluh.php?alert=gagal");
	}else{
		move_uploaded_file($_FILES['trnfoto']['tmp_name'], '../gambar/bukti/'.$rand.'_'.$filename);
		$xgambar = $rand.'_'.$filename;
		mysqli_query($koneksi, "update penyuluh set penyuluh='$penyuluh', nip='$nip', penyuluh_foto='$xgambar' where penyuluh_id='$id'");
		header("location:penyuluh.php?alert=berhasilupdate");
	}
}

