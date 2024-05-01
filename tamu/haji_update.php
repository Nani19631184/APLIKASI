<?php 
include '../koneksi.php';
$id  = $_POST['id'];
$username= $_POST['username']; 
$alamat = $_POST['alamat'];
$no_hp = $_POST['no_hp'];
$status  = $_POST['status'];

$rand = rand();
$allowed =  array('jpg','jpeg','pdf');
$filename = $_FILES['trnfoto']['name'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

if($filename == ""){

mysqli_query($koneksi, "update haji set username='$username', alamat='$alamat', no_hp='$no_hp', status='$status' where haji_id='$id'")or die(mysqli_error($koneksi));
header("location:haji.php");

}else{
	$ext = pathinfo($filename, PATHINFO_EXTENSION);

	if(!in_array($ext,$allowed) ) {
		header("location:haji.php?alert=gagal");
	}else{
		move_uploaded_file($_FILES['trnfoto']['tmp_name'], '../gambar/bukti/'.$rand.'_'.$filename);
		$xgambar = $rand.'_'.$filename;
		mysqli_query($koneksi, "update haji set username='$username', alamat='$alamat', no_hp='$no_hp', haji_foto='$xgambar', status='$status'  where haji_id='$id'");
		header("location:haji.php?alert=berhasilupdate");
	}
}