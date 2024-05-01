<?php 
include '../koneksi.php';
$id  = $_GET['id'];

mysqli_query($koneksi, "delete from nikah where nikah_id='$id'");
header("location:nikah.php");

