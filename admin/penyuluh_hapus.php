<?php 
include '../koneksi.php';
$id  = $_GET['id'];

mysqli_query($koneksi, "update jadwal set penyuluh='1' where penyuluh='$id'");

mysqli_query($koneksi, "delete from penyuluh where penyuluh_id='$id'");
header("location:penyuluh.php");