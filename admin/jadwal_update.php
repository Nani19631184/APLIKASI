<?php 
include '../koneksi.php';
$id = $_POST['id'];
$jadwal_tanggal  = $_POST['jadwal_tanggal'];
$nama= $_POST['nama'];
$wali = $_POST['wali'];
$jadwal_tgl = $_POST['jadwal_tgl'];
$tempat = $_POST['tempat'];
$no_hp = $_POST['no_hp'];
$penghulu = $_POST['penghulu'];

mysqli_query($koneksi, "update jadwal set jadwal_tanggal='$jadwal_tanggal', nama='$nama',  wali='$wali', jadwal_tgl='$jadwal_tgl',  tempat='$tempat', no_hp='$no_hp', penghulu='$penghulu' where jadwal_id='$id'")or die(mysqli_error($koneksi));
header("location:jadwal.php");
