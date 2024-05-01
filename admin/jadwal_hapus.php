<?php 
include '../koneksi.php';
$id  = $_GET['id'];

mysqli_query($koneksi, "delete from jadwal where jadwal_id='$id'");
header("location:jadwal.php");

