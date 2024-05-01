<?php 
include '../koneksi.php';
$jadwal_tanggal  = $_POST['jadwal_tanggal'];
$np = $_POST['np'];
$nama= $_POST['nama'];
$username= $_POST['username'];
$wali = $_POST['wali'];
$jadwal_tgl = $_POST['jadwal_tgl'];
$tempat = $_POST['tempat'];
$no_hp = $_POST['no_hp'];
$penghulu = $_POST['penghulu'];

mysqli_query($koneksi, "insert into jadwal values (NULL,'$jadwal_tanggal','$np','$nama','$username','$wali','$jadwal_tgl','$tempat','$no_hp','$penghulu')")or die(mysqli_error($koneksi));
header("location:jadwal.php?alert=berhasil");


