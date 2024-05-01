<?php 
include '../koneksi.php';
$id  = $_GET['id'];

mysqli_query($koneksi, "delete from bimbingan where bimbingan_id='$id'");
header("location:bimbingan.php");

