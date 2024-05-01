<?php 
include '../koneksi.php';
$jadwal_tanggal  = $_POST['jadwal_tanggal'];
$np = $_POST['np'];
$nama= $_POST['nama'];
$username= $_POST['username'];
$alamat = $_POST['alamat'];
$jadwal_tgl = $_POST['jadwal_tgl'];
$penyuluh = $_POST['penyuluh'];

mysqli_query($koneksi, "insert into jhaji values (Null,'$jadwal_tanggal','$np','$nama','$username','$alamat','$jadwal_tgl','$penyuluh')")or die(mysqli_error($koneksi));
header("location:jhaji.php?alert=berhasil");


