<?php 
include '../koneksi.php';
$id = $_POST['id'];
$jadwal_tanggal  = $_POST['jadwal_tanggal'];
$np = $_POST['np'];
$nama= $_POST['nama'];
$alamat = $_POST['alamat'];
$jadwal_tgl = $_POST['jadwal_tgl'];
$penyuluh = $_POST['penyuluh'];

mysqli_query($koneksi, "update jhaji set jadwal_tanggal='$jadwal_tanggal', np='$np', nama='$nama', alamat='$alamat', jadwal_tgl='$jadwal_tgl', penyuluh='$penyuluh' where jhaji_id='$id'")or die(mysqli_error($koneksi));
header("location:jhaji.php");
