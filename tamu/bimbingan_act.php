<?php 
include '../koneksi.php';
$jadwal_tanggal = $_POST['jadwal_tanggal'];
$username= $_POST['username']; 
$alamat= $_POST['alamat'];
$jadwal_tgl = $_POST['jadwal_tgl'];
$no_hp = $_POST['no_hp'];
$penyuluh = $_POST['penyuluh'];
$status  = $_POST['status'];

mysqli_query($koneksi, "insert into bimbingan values (NULL,'$jadwal_tanggal','$username','$alamat','$jadwal_tgl','$no_hp','$penyuluh','$status')")or die(mysqli_error($koneksi));
header("location:bimbingan.php?alert=berhasil");
