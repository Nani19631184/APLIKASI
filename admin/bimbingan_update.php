<?php 
include '../koneksi.php';
$id = $_POST['id'];
$alamat= $_POST['alamat'];
$jadwal_tgl = $_POST['jadwal_tgl'];
$no_hp = $_POST['no_hp'];
$penyuluh = $_POST['penyuluh'];
$status  = $_POST['status'];

mysqli_query($koneksi, "update bimbingan set alamat='$alamat', jadwal_tgl='$jadwal_tgl', no_hp='$no_hp', penyuluh='$penyuluh', status='$status' where bimbingan_id='$id'")or die(mysqli_error($koneksi));
header("location:bimbingan.php");
