<?php 
include '../koneksi.php';
$id  = $_GET['id'];

mysqli_query($koneksi, "update jadwal set penghulu='1' where penghulu='$id'");

mysqli_query($koneksi, "delete from penghulu where penghulu_id='$id'");
header("location:penghulu.php");