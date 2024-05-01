<?php 
include '../koneksi.php';
$id  = $_GET['id'];

mysqli_query($koneksi, "delete from mesjid where masjid_id='$id'");
header("location:masjid.php");
