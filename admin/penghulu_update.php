<?php 
include '../koneksi.php';
$id  = $_POST['id'];
$penghulu  = $_POST['penghulu'];
$nip = $_POST['nip'];

$rand = rand();
$allowed =  array('jpg','jpeg','pdf');
$filename = $_FILES['trnfoto']['name'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

if($filename == ""){
	mysqli_query($koneksi, "update penghulu set penghulu='$penghulu', nip='$nip' where penghulu_id='$id'") or die(mysqli_error($koneksi));
	
     header("location:penghulu.php?alert=berhasilupdate");
}else{
	$ext = pathinfo($filename, PATHINFO_EXTENSION);

	if(!in_array($ext,$allowed) ) {
		header("location:penghulu.php?alert=gagal");
	}else{
		move_uploaded_file($_FILES['trnfoto']['tmp_name'], '../gambar/bukti/'.$rand.'_'.$filename);
		$xgambar = $rand.'_'.$filename;
		mysqli_query($koneksi, "update penghulu set penghulu='$penghulu', nip='$nip', penghulu_foto='$xgambar' where penghulu_id='$id'");
		header("location:penghulu.php?alert=berhasilupdate");
	}
}

