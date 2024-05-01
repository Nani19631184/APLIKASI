<?php 
include '../koneksi.php';
$id  = $_GET['id'];

mysqli_query($koneksi, "delete from jhaji where jhaji_id='$id'");
header("location:jhaji.php");

