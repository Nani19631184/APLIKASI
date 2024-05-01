<?php 
include '../koneksi.php';
$id  = $_GET['id'];

mysqli_query($koneksi, "delete from haji where haji_id='$id'");
header("location:haji.php");


