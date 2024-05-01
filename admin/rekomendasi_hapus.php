<?php 
include '../koneksi.php';
$id  = $_GET['id'];

mysqli_query($koneksi, "delete from rekomendasi where rekomendasi_id='$id'");
header("location:rekomendasi.php");
